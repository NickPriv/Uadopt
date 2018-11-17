Drop TABLE Match;
DROP TABLE Adopter;
DROP TABLE Pet;


CREATE TABLE Adopter 
(
	userID VARCHAR(5) Primary key,
	name VARCHAR(35),
	age Integer, 
	maritalSatus Integer,
	home Integer,
	yard Integer,
	numberOfKids Integer,
	incomeStatus Integer,
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
	heath Integer,
	userSize Integer
);

CREATE TABLE Pet 
(
	petID VARCHAR(5) Primary key,
	breed VARCHAR(20),
	noise Integer,
	activityLevelDog Integer,
	intellegence Integer,
	hairShedding Integer,
	goodWithKids Integer,
	cuddly Integer,
	temperment Integer,
	timeCommitment Integer,
	easeToTrain Integer,
	heath Integer,
	petSize Integer,
	description VARCHAR(400)
);

CREATE TABLE Match 
(
	userID VARCHAR(5), 
	petID VARCHAR(5),
	matchPercentage Integer,
	Foreign Key(userID) REFERENCES Adopter(userID),
	Foreign Key(petID) REFERENCES Pet(petID)
);

CREATE SEQUENCE sequence_1
start with 1
increment by 1
minvalue 0
maxvalue 1000
cycle;

CREATE SEQUENCE sequence_2
start with 1
increment by 1
minvalue 0
maxvalue 1000
cycle;

INSERT INTO Pet values (sequence_2.nextval, 'Australian Shepherd', 4, 5, 5, 3, 4, 5, 4, 4, 5, 2, 3,
 'Australian Shepherds very energetic dogs. They are quite variable in temperament, 
 but these intelligent dogs can be a fun and exciting addition to your household. 
 Their energy is charming, but they do require a substantial amount of physical activity 
 and mental stimulation, making them a better fit for a more active household willing 
 to make the time commitment.');




INSERT INTO Pet values (sequence_2.nextval, 'Beagle', 5, 4, 4, 3, 5, 4, 5, 2, 1, 1, 2, 
	'Beagles are active, playful and friendly dogs. They are great with kids and a 
	convenient small size. But, don’t let their smaller size fool you, beagles still 
	equire a moderate amount of exercise or an open yard to run around in. Beagles can 
	be hard to train, so you must be diligent in training when they are puppies.');

INSERT INTO Adopter values (sequence_1.nextval, 'steve', 22, 1, 2, 2, 5, 2, 5, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);







