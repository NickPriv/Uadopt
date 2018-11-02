CREATE TABLE User 
(
	userID VARCHAR(5) Primary key,
	age Integer, 
	maritalSatus VARCHAR(20),
	numberOfKids Integer,
	kindsUnderTen boolean, 
	yard VARCHAR(10),
	activityLevelUser Integer,
	freetime Integer,
	prirorKnowlege Integer,
	noise Integer,
	activityLevelDog Integer,
	intellegence Integer,
	hairShedding Integer,
	goodWithKids Integer,
	cuddly Integer,
	temperment Integer,
	timeCommitment Integer,
	easeToTrain Integer,
	heath Integer
);

CREATE TABLE Pet 
(
	petID VARCHAR(5) Primary key,
	noise Integer,
	activityLevelDog Integer,
	intellegence Integer,
	hairShedding Integer,
	goodWithKids Integer,
	cuddly Integer,
	temperment Integer,
	timeCommitment Integer,
	easeToTrain Integer,
	heath Integer
);

CREATE TABLE Match 
(
	userID VARCHAR(5) Foreign key, 
	petID VARCHAR(5) Foreign key,
	matchPercentage Integer
);

INSERT INTO User values();
