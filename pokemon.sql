DROP Table IF EXISTS nature;
DROP Table IF EXISTS pokemon;

CREATE TABLE pokemon(
    id INT PRIMARY KEY,
    nom varchar(20),
    base_pv int,
    base_atk int,
    base_def int,
    base_atk_spe int,
    base_def_spe int,
    base_spd int,
    ev_pv int,
    ev_atk int,
    ev_def int,
    ev_atk_spe int,
    ev_def_spe int,
    ev_spd int,
    type1 varchar(20),
    type2 varchar(20)
);
CREATE TABLE nature(
    id INT PRIMARY KEY,
    nom varchar(20),
    bonus varchar(20),
    malus varchar(20)
);
INSERT INTO nature VALUES(1,"assure","base_def","base_atk");
INSERT INTO nature VALUES(2,"bizarre","-","-");
INSERT INTO nature VALUES(3,"brave","base_atk","base_spd");
INSERT INTO nature VALUES(4,"calme","base_def_sep","base_atk");
INSERT INTO nature VALUES(5,"discret","base_atk_spe","base_spd");
INSERT INTO nature VALUES(6,"docile","-","-");
INSERT INTO nature VALUES(7,"doux","base_atk_spe","base_def");
INSERT INTO nature VALUES(8,"foufou","base_atk_spe","base_def_spe");
INSERT INTO nature VALUES(9,"gentil","base_def_spe","base_def");
INSERT INTO nature VALUES(10,"hardi","-","-");
INSERT INTO nature VALUES(11,"joviale","base_spd","base_atk_spe");
INSERT INTO nature VALUES(12,"lache","base_def","base_def_spe");
INSERT INTO nature VALUES(13,"malin","base_def","base_atk_spe");
INSERT INTO nature VALUES(14,"malpoli","base_def_spe","base_spd");
INSERT INTO nature VALUES(15,"mauvais","base_atk","base_def_spe");
INSERT INTO nature VALUES(16,"modeste","base_atk_spe","base_atk");
INSERT INTO nature VALUES(17,"naif","base_spd","base_def_spe");
INSERT INTO nature VALUES(18,"presse","base_spd","base_def");
INSERT INTO nature VALUES(19,"prudent","base_def_spe","base_atk_spe");
INSERT INTO nature VALUES(20,"pudique","-","-");
INSERT INTO nature VALUES(21,"relax","base_def","base_spd");
INSERT INTO nature VALUES(22,"rigide","base_atk","base_atk_spe");
INSERT INTO nature VALUES(23,"serieux","-","-");
INSERT INTO nature VALUES(24,"solo","base_atk","base_def");
INSERT INTO nature VALUES(25,"timide","base_atk","base_def");

LOAD DATA LOCAL INFILE "poke.txt"
INTO TABLE pokemon.pokemon
FIELDS TERMINATED BY ' /'
IGNORE 1 LINES;