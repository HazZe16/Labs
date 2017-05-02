Drop Table if exists Inventory;
Drop Table if exists ConfidentLocation;
Drop Table if exists ShopLocation;
Drop Table if exists ShopStock;
Drop Table if exists Bonds;
Drop Table if exists Confidents;
Drop Table if exists QuestGivers;
Drop Table if exists NonPlayable;
Drop Table if exists Playable;
Drop Table if exists HealingItems;
Drop Table if exists CombatItems;
Drop Table if exists HelpfulItems;
Drop Table if exists Accessory;
Drop Table if exists Armor;
Drop Table if exists MeleeWeapons;
Drop Table if exists RangedWeapons;
Drop Table if exists Equipment;
Drop Table if exists KeyItems;
Drop Table if exists MainCharacter;
Drop Table if exists Weather;
Drop Table if exists Day;
Drop Table if exists Time;
Drop Table if exists Locations;
Drop Table if exists Shop;
Drop Table if exists Items;
Drop Table if exists Characters;


--Table Creations --

CREATE Table Characters (
	Cid    varchar(4) Unique Not NULL,
	Name   Text,
Primary key (Cid)
);

Create Table Items (
	ItemID  varchar(4) Unique Not NULL,
	ItemName	Text,
Primary key (ItemID)
);

Create Table Shop(
	Sid    varchar(4) Unique Not NULL,
	ShopName   Text,
Primary key (Sid)
);

Create Table Locations (
	Lid    varchar(4) Unique Not NULL,
	LocationName   Text,
Primary key (Lid)
);

Create Table Time (
	Tid    varchar(4) Unique Not NULL,
	TimeName   Text,
Primary key (Tid)
);


Create Table Day (
	Did    varchar(4) Unique Not NULL,
	DayName   Text,
Primary key (Did)
);


Create Table Weather (
	Wid    varchar(4) Unique Not NULL,
	WeatherName   Text,
Primary key (Wid)
);

Create Table MainCharacter (
	Cid     varchar(4) Unique Not NULL references Characters(Cid),
	Health  int,
	SP      int,
	Money	int,
Primary key (Cid)
);

Create Table KeyItems (
	ItemID  varchar(4) Unique Not NULL references Items(Itemid),
Primary key (Itemid)
);

Create Table Equipment (
	ItemID      varchar(4) Unique Not NULL references Items(Itemid),
	Effects     text,
	Stats       integer,
	EquippedBy  varchar(4) references Characters(Cid),
Primary key (Itemid, EquippedBy)
);

Create Table RangedWeapons (
	ItemID  varchar(4) Not NULL references Equipment(Itemid),
	Ammo    integer,
Primary key (Itemid)
);

Create Table MeleeWeapons (
	ItemID  varchar(4) Not NULL references Equipment(Itemid),
Primary key (Itemid)
);

Create Table Armor (
	ItemID  varchar(4) Not NULL references Equipment(Itemid),
Primary key (Itemid)
);

Create Table Accessory (
	ItemID  varchar(4) Not NULL references Equipment(Itemid),
Primary key (Itemid)
);

Create Table HelpfulItems (
	ItemID  varchar(4) Not NULL references Items(Itemid),
	Effects text,
Primary key (Itemid)
);

Create Table CombatItems (
	ItemID  varchar(4) Not NULL references HelpfulItems(Itemid),
	Damage	integer,
Primary key (Itemid)
);

Create Table HealingItems (
	ItemID  varchar(4) Not NULL references HelpfulItems(Itemid),
	Recover integer,
	Who     text,
Primary key (Itemid)
);

Create Table Playable (
	Cid    varchar(4) Unique Not NULL references Characters(Cid),
	HP     integer,
	SP     integer,
Primary key (Cid)
);

Create Table NonPlayable (
	Cid    varchar(4) Unique Not NULL references Characters(Cid),
Primary key (Cid)
);


Create Table QuestGivers (
	Cid    varchar(4)  Not NULL references NonPlayable(Cid),
	Qid    varchar(4)  Not NULL,
Primary key (Cid, Qid)
);


Create Table Confidents (
	Cid    varchar(4) Unique Not NULL references Characters(Cid),
	Aid    varchar(4) Unique Not NULL,
	Arcana text,
Primary key (Cid)
);


Create Table Bonds (
	Cid    varchar(4) Not NULL references MainCharacter(Cid),
	Aid    varchar(4) Not NULL references Confidents(Aid),
	Rank   int,
	Points int,		
Primary key (Cid, Aid)
);


Create Table ShopStock (
	Sid    varchar(4) Not NULL references Shop(Sid),
	ItemID varchar(4) Not NULL references Items(ItemID),
	Price  integer,
	Stock  Integer CHECK (Stock <100),
Primary key (Sid, ItemID)
);

Create Table ShopLocation (
	Sid    varchar(4) Not NULL references Shop(Sid),
	Lid    varchar(4) Not NULL references Locations(Lid),
	Tid    varchar(4) Not NULL references Time(Tid),
Primary key (Sid, Lid, Tid)
);

Create Table ConfidentLocation (
	Cid    varchar(4) Not NULL references Characters(Cid),
	Lid    varchar(4) Not NULL references Locations(Lid),
	Did    varchar(4) Not NULL references Day(Did),
	Tid    varchar(4) Not NULL references Time(Tid),
	Wid    varchar(4) Not NULL references Weather(Wid),
	RankPoints	integer,
Primary key (Cid, Lid, Did, Wid, Tid)
);

Create Table Inventory (
	Cid    varchar(4) Not NULL references Characters(Cid),
	ItemID varchar(4) Not NULL references Items(ItemID),
	Quantity  Integer DEFAULT '0',
Primary key (Cid, ItemID)
);

--Character Inserts--

INSERT INTO Characters( cid, name)
  VALUES('c000', 'All');

INSERT INTO Characters( cid, name)
  VALUES('c001', 'Alan');

INSERT INTO Characters( cid, name)
  VALUES('c002', 'Ryuji');

INSERT INTO Characters( cid, name)
  VALUES('c003', 'Ann');

INSERT INTO Characters( cid, name)
  VALUES('c004', 'Morgana');

INSERT INTO Characters( cid, name)
  VALUES('c005', 'Yusuke');

INSERT INTO Characters( cid, name)
  VALUES('c006', 'Makoto');

INSERT INTO Characters( cid, name)
  VALUES('c007', 'Haru');

INSERT INTO Characters( cid, name)
  VALUES('c008', 'Akechi');

INSERT INTO Characters( cid, name)
  VALUES('c009', 'Futaba');

INSERT INTO Characters( cid, name)
  VALUES('c010', 'Mishama');

INSERT INTO Characters( cid, name)
  VALUES('c011', 'Kawakami');

INSERT INTO Characters( cid, name)
  VALUES('c012', 'Sojiro');

INSERT INTO Characters( cid, name)
  VALUES('c013', 'Sae');

INSERT INTO Characters( cid, name)
  VALUES('c014', 'Hifumi');

INSERT INTO MainCharacter( cid, Health, SP, money)
  VALUES('c001', 300, 200, 50000);

INSERT INTO Playable(cid, HP, SP)
  VALUES('c002', 450, 100);

INSERT INTO Playable(cid, HP, SP)
  VALUES('c003', 200, 250);

INSERT INTO Playable(cid, HP, SP)
  VALUES('c004', 200, 150);

INSERT INTO Playable(cid, HP, SP)
  VALUES('c005', 450, 150);

INSERT INTO Playable(cid, HP, SP)
  VALUES('c006', 400, 200);

INSERT INTO Playable(cid, HP, SP)
  VALUES('c007', 50, 500);

INSERT INTO Playable (cid, HP, SP)
  VALUES('c008', 300, 250);

INSERT INTO Playable(cid, HP, SP)
  VALUES('c009', 300, 300);

INSERT INTO NonPlayable ( cid)
  VALUES('c010');

INSERT INTO NonPlayable ( cid)
  VALUES('c011');

INSERT INTO NonPlayable ( cid)
  VALUES('c012');

INSERT INTO NonPlayable ( cid)
  VALUES('c013');

INSERT INTO NonPlayable ( cid)
  VALUES('c014');

INSERT INTO QuestGivers (cid, Qid)
  VALUES('c010', 'q001');

INSERT INTO QuestGivers (cid, Qid)
  VALUES('c010', 'q002');

INSERT INTO QuestGivers (cid, Qid)
  VALUES('c011', 'q003');

INSERT INTO QuestGivers (cid, Qid)
  VALUES('c014', 'q004');

INSERT INTO Confidents (cid, Aid, Arcana)
  VALUES('c002', 'a007', 'Chariot');

INSERT INTO Confidents (cid, Aid, Arcana)
  VALUES('c003', 'a006', 'Lovers');

INSERT INTO Confidents (cid, Aid, Arcana)
  VALUES('c004', 'a001', 'Magician');

INSERT INTO Confidents (cid, Aid, Arcana)
  VALUES('c005', 'a004', 'Emperor');

INSERT INTO Confidents (cid, Aid, Arcana)
  VALUES('c006', 'a002', 'Priestess');

INSERT INTO Confidents (cid, Aid, Arcana)
  VALUES('c007', 'a003', 'Empress');

INSERT INTO Confidents (cid, Aid, Arcana)
  VALUES('c008', 'a008', 'Justice');

INSERT INTO Confidents (cid, Aid, Arcana)
  VALUES('c009', 'a009', 'Hermit');

INSERT INTO Confidents (cid, Aid, Arcana)
  VALUES('c010', 'a018', 'Moon');

INSERT INTO Confidents (cid, Aid, Arcana)
  VALUES('c011', 'a014', 'Temperance');

INSERT INTO Confidents (cid, Aid, Arcana)
  VALUES('c012', 'a005', 'Heirophant');

INSERT INTO Confidents (cid, Aid, Arcana)
  VALUES('c014', 'a017', 'Star');

--Time Day Weather Inserts --

INSERT INTO Time (Tid, TimeName)
  VALUES('T000', 'Anytime');

INSERT INTO Time (Tid, TimeName)
  VALUES('T001', 'Daytime');

INSERT INTO Time (Tid, TimeName)
  VALUES('T002', 'Morning');

INSERT INTO Time (Tid, TimeName)
  VALUES('T003', 'Lunchtime');

INSERT INTO Time (Tid, TimeName)
  VALUES('T004', 'Afternoon');

INSERT INTO Time (Tid, TimeName)
  VALUES('T005', 'Afterschool');

INSERT INTO Time (Tid, TimeName)
  VALUES('T006', 'Evening');

INSERT INTO Time (Tid, TimeName)
  VALUES('T007', 'Summer Break');


INSERT INTO Day (Did, DayName)
  VALUES('D000', 'Anyday');

INSERT INTO Day (Did, DayName)
  VALUES('D001', 'Monday');

INSERT INTO Day (Did, DayName)
  VALUES('D002', 'Tuesday');

INSERT INTO Day (Did, DayName)
  VALUES('D003', 'Wednesday');

INSERT INTO Day (Did, DayName)
  VALUES('D004', 'Thursday');

INSERT INTO Day (Did, DayName)
  VALUES('D005', 'Friday');

INSERT INTO Day (Did, DayName)
  VALUES('D006', 'Saturday');

INSERT INTO Day (Did, DayName)
  VALUES('D007', 'Sunday');

INSERT INTO Weather (Wid, WeatherName)
  VALUES('W000', 'Any');

INSERT INTO Weather (Wid, WeatherName)
  VALUES('W001', 'Sunny');

INSERT INTO Weather (Wid, WeatherName)
  VALUES('W002', 'Rain');

INSERT INTO Weather (Wid, WeatherName)
  VALUES('W003', 'Heat Wave');

INSERT INTO Weather (Wid, WeatherName)
  VALUES('W004', 'Torrential Rain');

INSERT INTO Weather (Wid, WeatherName)
  VALUES('W005', 'Pollen');

INSERT INTO Weather (Wid, WeatherName)
  VALUES('W006', 'Snow');

--Location and Shop Inserts --

INSERT INTO Locations (Lid, Locationname)
  VALUES('L000', 'Yougen-Jaya: Backstreets'),
  	('L001', 'Yougen-Jaya: Cafe Leblanc'),
	('L002', 'Yougen-Jaya: Clinic'),
	('L003', 'Yougen-Jaya: Bathhouse'),
	('L004', 'Yougen-Jaya: Laundromat'),
	('L005', 'Yougen-Jaya: Batting Cages'),
	('L007', 'Shibuya: Station Square'),
	('L008', 'Shibuya: Central Street'),
	('L009', 'Shibuya: Underground Walkway'),
	('L010', 'Shibuya: Underground Mall'),
	('L011', 'Shibuya: Arcade'),
	('L012', 'Shibuya: Sports Gym'),
	('L013', 'Aoyama-Itchome: Rooftop'),
	('L014', 'Aoyama-Itchome: Classroom'),
	('L015', 'Aoyama-Itchome: Library'),
	('L016', 'Aoyama-Itchome: Courtyard'),
	('L017', 'Aoyama-Itchome: Student Council Room'),
	('L018', 'Aoyama-Itchome: Entrance'),
	('L019', 'Aoyama-Itchome: School Gate'),
	('L020', 'Shinjuku: Red-Light District'),
	('L021', 'Shinjuku: Crossings Bar'),
	('L022', 'Akihabara: Electric Town'),
	('L023', 'Akihabara: Arcade'),
	('L024', 'Akihabara: Maid Cafe'),
	('L025', 'Kanda Church');
	

INSERT INTO Shop (Sid, Shopname)
  VALUES('S001', 'Second-hand Shop'),
	('S002', 'Supermarket'),
	('S003', 'Scarlet'),
	('S004', 'Bookstore'),
	('S005', 'Airsoft shop'),
	('S006', 'Big Bang Burger'),
	('S007', 'Diner'),
	('S008', 'Beef Bowl Shop'),
	('S009', 'Convenience Store'),
	('S010', 'Theater'),
	('S011', 'Flower Shop'),
	('S012', 'Lottery Shop'),
	('S013', 'Drug Store'),
	('S014', 'Rocinante'),
	('S015', 'Drink Stand'),
	('S016', 'Station Kiosk'),
	('S017', 'Accessory Shop'),
	('S018', 'Cosmetics Shop'),
	('S019', 'Jewelry Shop'),
	('S020', 'Japanese Sundries Shop'),
	('S021', 'Music Store'),
	('S022', 'School Store'),
	('S023', 'Electronics Superstore'),
	('S024', 'Otaku Goods Shop'),
	('S025', 'Machone Parts Shop'),
	('S026', 'Retro Game Shop'),
	('S027', 'General Store'),
	('S028', 'Flower Shop');

--Item Inserts--

INSERT INTO Items (ItemID, ItemName)
  VALUES('I001', 'Movie Ticket'),
        ('I002', 'Adhesive Bandage'),
	('I003', 'Protein'), 
	('I004', 'Takemedic'),
	('I005', 'Takemedic-All'),
	('I006', 'Stun Gun'),
	('I007', 'Air Cannon'),
	('I008', 'Machete'),
	('I009', 'Spike Rod'),
	('I010', 'Heavy Saber'),
	('I011', 'Mirage Whip'),
	('I012', 'Imperial Sword'),
	('I013', 'Iron Fist'),
	('I014', 'Cresent Axe'),
	('I015', 'Quasar Saber'),
	('I016', 'Eliminator'),
	('I017', 'Heavy shotgun'),
	('I018', 'MP2 Prototype'),
	('I019', 'Northern Light'),
	('I020', 'Rebel Rifle'),
	('I021', 'Peacemaker'),
	('I022', 'Scorcher'),
	('I023', 'Moebius'),
	('I024', 'Brave Waistcoat'),
	('I025', 'Morose Collar'),
	('I026', 'Yama Dress'),
	('I027', 'Egoist Shirt'),
	('I028', 'Rune Dress'),
	('I029', 'Ghillie Vest'),
	('I030', 'Resist Ring'),
	('I031', 'Spirit Belt'),
	('I032', 'Heat Mask');

INSERT INTO KeyItems (ItemID)
  VALUES('I001');


INSERT INTO HelpfulItems (ItemID, Effects)
  Values('I002', 'Heal'),
	('I003', 'Heal'), 
	('I004', 'Heal'),
	('I005', 'Heal'),
	('I006', 'Damage'),
	('I007', 'Damage');
	 
INSERT INTO HealingItems (ItemID, Recover, Who)
  Values('I002', '20', 'one HP'),
	('I003', '30', 'one HP'), 
	('I004', '100', 'one HP'),
	('I005', '100', 'all HP');


INSERT INTO CombatItems (ItemID, Damage)
  Values('I006', 50),
	('I007', 100);

INSERT INTO Equipment (ItemID, Effects, Stats, EquippedBy)
  VALUES('I008', 'Instant Kill (small)', 204, 'c001'),
	('I009', NULL , 132, 'c002'),
	('I010', NULL , 200, 'c003'),
	('I011', 'Despair (high)', 204, 'c004'),
	('I012', 'Crit Chance (mid)', 204, 'c005'),
	('I013', 'Burn (small)', 204, 'c006'),
	('I014', 'Reflect Phys (small)', 204, 'c007'),
	('I015', NULL , 204, 'c008'),
	('I016', 'Crit Chance (small)', 156, 'c001'),
	('I017', 'Dizzy (small)', 116, 'c002'),
	('I018', NULL, 110, 'c003'),
	('I019', NULL, 178, 'c004'),
	('I020', 'Burn (Low)', 178, 'c005'),
	('I021', 'Despair (med)', 134, 'c006'),
	('I022', 'Freeze (high)', 170, 'c007'),
	('I023', 'Confuse (mid)', 234, 'c008'),
	('I024', 'Str +3', 192, 'c001'),
	('I025', 'Resist Dizzy', 180, 'c004'),
	('I026', 'SP +30', 174, 'c003'),
	('I027', NULL, 167, 'c005'),
	('I028', 'Resist Fire(med)', 156, 'c006'),
	('I029', 'Resist Curse(small)', 180, 'c008'),
	('I030', 'Reduce Magic Damage', 0, 'c000'),
	('I031', 'Reduce Physical Damage', 0, 'c000'),
	('I032', 'Evade Nuke' ,0, 'c000');
	 	


INSERT INTO MeleeWeapons (ItemID)
  VALUES('I008'),
	('I009'),
	('I010'),
	('I011'),
	('I012'),
	('I013'),
	('I014'),
	('I015');


INSERT INTO RangedWeapons (ItemID, Ammo)
  VALUES('I016', 16),
	('I017', 8),
	('I018', 12),
	('I019', 48),
	('I020', 32),
	('I021', 12),
	('I022', 6),
	('I023', 18);

INSERT INTO Armor (ItemID)
  VALUES('I024'),
	('I025'),
	('I026'),
	('I027'),
	('I028'),
	('I029');

INSERT INTO Accessory (ItemID)
  VALUES('I030'),
	('I031'),
	('I032');

-- Test Data--


Insert into Bonds(Cid, Aid, Rank, Points)
  Values('c001', 'a007', 3, 5),
        ('c001', 'a006', 2, 3),
	('c001', 'a009', 4, 6);

Insert into ShopLocation(Sid, Lid, Tid)
  Values('S001', 'L000', 'T000'),
	('S021', 'L010', 'T000'),
	('S022', 'L010', 'T005'),
	('S026', 'L022', 'T004'),
	('S028', 'L020', 'T006');

Insert into ShopStock(Sid, ItemID, Price, Stock)
  Values('S001', 'I002', 120, 99),
	('S010', 'I001', 1500,1),
	('S005', 'I008', 30400, 3),
	('S005', 'I018', 9600, 5),
	('S005', 'I025', 32499, 99),
	('S019', 'I030', 50000, 1);

Insert into Inventory(Cid, ItemID, Quantity)
  Values('c001', 'I008', 1),
  	('c004', 'I004', 3),
	('c003', 'I018', 1);

  
Insert into ConfidentLocation(Cid, Lid, Did, Tid, Wid, RankPoints)
  Values('c002', 'L011', 'D006', 'T005', 'W001', 3),
	('c005', 'L009', 'D005', 'T004', 'W001', 1),
	('c005', 'L009', 'D006', 'T005', 'W002', 1),
	('c006', 'L017', 'D003', 'T005', 'W002', 2),
	('c006', 'L020', 'D006', 'T005', 'W001', 3),
	('c012', 'L001', 'D000', 'T006', 'W000', 3);

--Reports--

Select name, Count(Qid)
From Characters c, Nonplayable n, Questgivers q
Where c.cid = n.cid
AND   n.cid = q.cid
GROUP BY c.name;


Select name, Sum(Price)
From Characters c,
Items i,
Equipment e,
ShopStock s
Where c.cid = e.Equippedby
AND   e.ItemID = s.ItemID
GROUP BY c.cid, c.name
ORDER BY c.cid;


-- View Statements--

Drop View if exists Equipped;

Create View Equipped AS
	Select c.name, i.Itemname, e.stats
    From Characters c, items i, equipment e
    Where e.EquippedBy = c.cid
    AND i.ItemID = e.ItemID;
    
Select *
from Equipped



Create or Replace View Activities AS
	Select S.Shopname, C.name
    From Shop S
    inner join ShopLocation SL on SL.Sid = S.Sid,
     Characters c
    inner join ConfidentLocation CL on c.cid = CL.Cid
    Where SL.Tid = 'T004'
    And CL.Tid = 'T004';
    
Select *
from Activities

--Stored Procedures--

CREATE OR REPLACE FUNCTION FindingConfident (Text)
RETURNS TABLE (Name Text, LocationName Text, TimeName Text) 
AS $$
DECLARE
	Confident TEXT := $1;
BEGIN
RETURN QUERY
Select C.name, L.LocationName, T.TimeName
From ConfidentLocation CL
     inner join Characters C on CL.cid = C.cid
	 inner join Locations L  on CL.Lid = L.Lid
     inner join Time T  on CL.Tid = T.Tid
Where C.name = Confident;
END;
$$ LANGUAGE plpgsql;


Select FindingConfident('Makoto');

CREATE OR REPLACE FUNCTION FindingConfidentSpecified (Text, Refcursor) returns refcursor
AS $$
DECLARE
	Confident TEXT := $1;
    result refcursor := $2;
BEGIN
open result for
Select C.name, L.LocationName, T.TimeName
From ConfidentLocation CL
     inner join Characters C on CL.cid = C.cid
	 inner join Locations L  on CL.Lid = L.Lid
     inner join Time T  on CL.Tid = T.Tid
Where C.name = Confident;

return result; 
END;
$$ LANGUAGE plpgsql;


Select FindingConfidentSpecified ('Makoto', 'data');
fetch all from data;



CREATE OR REPLACE FUNCTION ItemType(Text)
RETURNS TABLE (ItemName Text) 
AS $$
DECLARE
	item TEXT := $1;
BEGIN
RETURN QUERY
Select I.ItemName
From Items I inner join HelpfulItems HI on I.Itemid = HI.Itemid
	Where HI.effects = item;
END;
$$ LANGUAGE plpgsql;

Select ItemType('Heal');

--Triggers--

CREATE OR REPLACE FUNCTION HealAll(int) RETURNS TRIGGER AS $$
DECLARE
   Heal  int;
Begin
	If (Playable.HP < 500)
    THEN
       UPDATE PLAYABLE
       SET HP = HP + Heal;
end IF;
Return HP;
END;
$$
LANGUAGE plpgsql;
        
        
CREATE TRIGGER HealAll
        AFTER UPDATE on Playable
        FOR EACH ROW 
        EXECUTE PROCEDURE Heal();

--Roles--

CREATE ROLE admin;
GRANT ALL ON ALL TABLES IN SCHEMA public TO admin;

CREATE ROLE Alan;
GRANT SELECT ON ALL TABLES IN SCHEMA public TO Alan;
GRANT INSERT ON Inventory, Bonds, MainCharacter, Playable to Alan;
GRANT UPDATE ON Inventory, Bonds, MainCharacter, Playable to Alan;