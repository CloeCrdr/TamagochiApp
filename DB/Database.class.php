<?php

abstract class Database
{

    private static ?PDO $pdo = null;

    /**
     * Create database connection
     * 
     * @return void
     */
    public static function getDatabase()
    {
        if (!self::$pdo) {
            $config = [
                "host" => "localhost",
                "port" => 8889,
                "username" => "root",
                "password" => "root",
                "engine" => "mysql"
            ];

            self::$pdo = new PDO(sprintf(
                "%s:host=%s:%s",
                $config["engine"],
                $config["host"],
                $config["port"]
            ), $config["username"], $config["password"], [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
            ]);
        }
        return self::$pdo;
    }

    /**
     * Create database if not exist 
     * 
     * @return void
     */
    public static function createDatabaseIfNotExists(string $database)
    {
        $pdo = self::getDatabase();
        $stmt = $pdo->prepare(sprintf("CREATE DATABASE IF NOT EXISTS %s", $database));
        $stmt->execute();

        self::use($database);
    }

    public static function dropDatabase(string $database)
    {
        $pdo = self::getDatabase();
        $stmt = $pdo->prepare(sprintf("DROP DATABASE %s", $database));
        $stmt->execute();
    }

    /**
     * Show database 
     *
     */
    public static function doesDatabaseExist(string $database): bool
    {
        $pdo = self::getDatabase();
        $stmt = $pdo->prepare("SHOW DATABASES");
        $stmt->execute();
        $databases = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($databases as $row) {
            if ($row["Database"] == $database) {
                return true;
            }
        }
        return false;
    }

    /**
     * Use the database 
     * 
     * @return array
     */
    public static function use(string $database)
    {
        $pdo = self::getDatabase();
        $stmt = $pdo->prepare(sprintf("USE %s", $database));
        $stmt->execute();
    }

    /**
     * Create a table in database
     * 
     * @return array
     */
    public static function createTable(Table $table)
    {
        $pdo = self::getDatabase();
        $sql = sprintf("CREATE TABLE %s (", $table->name);
        foreach ($table->columns as $column) {
            $sql .= sprintf("%s %s %s, ", $column->name, $column->type, $column->extras);
        }
        $sql .= sprintf(" PRIMARY KEY(%s)", $table->primaryKey);
        $sql .= ")";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    }

    /**
     * Create all database's tables
     * 
     * @return array
     */
    public static function createTables(array $tables)
    {
        foreach ($tables as $table) {
            self::createTable($table);
        }
    }

    /**
     * Migrate the database
     * 
     */
    public static function migrate(string $database, array $tables)
    {
        self::createDatabaseIfNotExists($database);
        self::createTables($tables);
    }

    public static function bulkInsert(string $table, array $columns, array $data)
    {
        $pdo = self::getDatabase();
        $sql = sprintf("INSERT INTO %s ", $table);
        $sql .= "(" . implode(', ', $columns) . ") VALUES ";
        foreach ($data as $row) {
            $sql .= "(" . implode(', ', array_fill(0, count($row), "?")) . "), ";
        }
        $sql = rtrim($sql, ", ");
        $pdo = self::getDatabase();
        $stmt = $pdo->prepare($sql);

        $i = 1;
        foreach ($data as $row) {
            foreach ($row as $value) {
                $stmt->bindValue($i++, $value);
            }
        }
        $stmt->execute();
        return true;
    }


    /**
     * Create all sql procedures 
     * 
     * @return void
     */
    public static function createSqlsProcedures()
    {
        try {
            $pdo = self::getDatabase();
            $stmt = $pdo->prepare("CREATE PROCEDURE CREATE_USER(IN name VARCHAR(255))
            BEGIN
                INSERT INTO users (username) VALUES (name);
            END");
            $stmt->execute();

            
            $stmt = $pdo->prepare("CREATE PROCEDURE CREATE_TAMAGOCHI(IN name VARCHAR(255),IN id VARCHAR(255))
            BEGIN
                INSERT INTO tamagotchi (name,faim,soif,ennui,sommeil,living,level,user_id,created_at,last_update) 
                VALUES (name,70,70,70,70,1,1,id,NOW(),NOW() );
            END");
            $stmt->execute();

            $stmt = $pdo->prepare("CREATE PROCEDURE EAT(IN id_tamago INT(2))
            BEGIN
                UPDATE tamagotchi SET faim = faim+30, soif = soif-10, sommeil = sommeil-5, ennui = ennui-5,last_update = NOW() WHERE id = id_tamago;
            END");
            $stmt->execute();

            $stmt = $pdo->prepare("CREATE PROCEDURE DRINK(IN id_tamago INT(2))
            BEGIN
                UPDATE tamagotchi SET faim = faim-10, soif = soif+30, sommeil = sommeil-5, ennui = ennui-5, last_update = NOW() WHERE id = id_tamago;
            END");
            $stmt->execute();

            $stmt = $pdo->prepare("CREATE PROCEDURE BEDTIME(IN id_tamago INT(2))
            BEGIN
                UPDATE tamagotchi SET faim = faim-10, soif = soif-15, sommeil = sommeil+30, ennui = ennui-15, last_update = NOW() WHERE id = id_tamago;
            END");
            $stmt->execute();
            
            $stmt = $pdo->prepare("CREATE PROCEDURE ENJOY(IN id_tamago INT(2))
            BEGIN
                UPDATE tamagotchi SET faim = faim-5, soif = soif-5, sommeil = sommeil-5, ennui = ennui+15, last_update = NOW() WHERE id = id_tamago;
            END");
            $stmt->execute();

            $stmt = $pdo->prepare("CREATE PROCEDURE MAX_STATS_faim(IN id_tamago INT(2))
            BEGIN
                UPDATE tamagotchi SET faim = 100 WHERE id = id_tamago;
            END");
            $stmt->execute();

            $stmt = $pdo->prepare("CREATE PROCEDURE MAX_STATS_soif(IN id_tamago INT(2))
            BEGIN
                UPDATE tamagotchi SET soif = 100 WHERE id = id_tamago;
            END");
            $stmt->execute();

            $stmt = $pdo->prepare("CREATE PROCEDURE MAX_STATS_ennui(IN id_tamago INT(2))
            BEGIN
                UPDATE tamagotchi SET ennui = 100 WHERE id = id_tamago;
            END");
            $stmt->execute();

            $stmt = $pdo->prepare("CREATE PROCEDURE MAX_STATS_sommeil(IN id_tamago INT(2))
            BEGIN
                UPDATE tamagotchi SET sommeil = 100 WHERE id = id_tamago;
            END");
            $stmt->execute();

            $stmt = $pdo->prepare("CREATE PROCEDURE KILL_TAMAGO(IN id_tamago INT(2))
            BEGIN
                UPDATE tamagotchi SET living = 0 WHERE id = id_tamago;
            END");
            $stmt->execute();

        } catch (Exception $e) {
            print $e->getMessage();
        }
    }

    /**
     * Triggers on action button to manage one tamagotchi
     */
    public static function triggersTamagosAction()
    {
        $pdo = self::getDatabase();

        $stmt = $pdo->prepare("CREATE TRIGGER update_stats_faim
        AFTER UPDATE ON tamagotchi
        FOR EACH ROW
        IF NEW.faim <> OLD.faim THEN
        BEGIN
        INSERT INTO tamagotchis_actions (tamagotchi_id, action_id, date)
        VALUES (NEW.id, 1, NOW());
        END;
        END IF");
        $stmt->execute();

        $stmt = $pdo->prepare("CREATE TRIGGER update_stats_soif
        AFTER UPDATE ON tamagotchi
        FOR EACH ROW
        IF NEW.soif <> OLD.soif AND NEW.soif THEN
        BEGIN
        INSERT INTO tamagotchis_actions (tamagotchi_id, action_id, date)
        VALUES (NEW.id, 2, NOW());
        END;
        END IF");
        $stmt->execute();

        $stmt = $pdo->prepare("CREATE TRIGGER update_stats_bedtime
        AFTER UPDATE ON tamagotchi
        FOR EACH ROW
        IF NEW.sommeil <> OLD.sommeil THEN
        BEGIN
        INSERT INTO tamagotchis_actions (tamagotchi_id, action_id, date)
        VALUES (NEW.id, 3, NOW());
        END;
        END IF");
        $stmt->execute();

        $stmt = $pdo->prepare("CREATE TRIGGER update_stats_enjoy
        AFTER UPDATE ON tamagotchi
        FOR EACH ROW
        IF NEW.ennui <> OLD.ennui THEN
        BEGIN
        INSERT INTO tamagotchis_actions (tamagotchi_id, action_id, date)
        VALUES (NEW.id, 4, NOW());
        END;
        END IF");
        $stmt->execute();

    }
}

class Table
{
    public string $name;
    public string $primaryKey;
    public array $columns;
    public string $extras;

    public function __construct(string $name, string $primaryKey, array $columns, string $extras = "")
    {
        $this->name = $name;
        $this->primaryKey = $primaryKey;
        $this->columns = $columns;
        $this->extras = $extras;
    }
}
class Column
{
    public string $name;
    public string $type;
    public string $extras;

    public function __construct(string $name, string $type, string $extras = "")
    {
        $this->name = $name;
        $this->type = $type;
        $this->extras = $extras;
    }
}
