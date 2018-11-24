Drop TABLE Match;
DROP TABLE Adopter;
DROP TABLE Pet;
DROP SEQUENCE sequence_adopter;
DROP SEQUENCE sequence_pet;


CREATE TABLE Adopter 
(
	userID VARCHAR(5) Primary key,
	name VARCHAR(35),
	age Integer, 
	maritalSatus VARCHAR(35),
	home VARCHAR(35),
	yard VARCHAR(35),
	numberOfKids Integer,
	incomeStatus VARCHAR(35),
	activityLevelUser Integer,
	freetime Integer,
	prirorKnowlege VARCHAR(5),
	noise Integer,
	activityLevelDog Integer,
	intelligence Integer,
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
	intelligence Integer,
	hairShedding Integer,
	goodWithKids Integer,
	cuddly Integer,
	temperment Integer,
	timeCommitment Integer,
	easeToTrain Integer,
	heath Integer,
	petSize Integer,
	description VARCHAR(400),
	photo VARCHAR(400)
);

CREATE TABLE Match 
(
	userID VARCHAR(5), 
	petID VARCHAR(5),
	matchPercentage Integer,
	Foreign Key(userID) REFERENCES Adopter(userID),
	Foreign Key(petID) REFERENCES Pet(petID)
);

CREATE SEQUENCE sequence_adopter
start with 1
increment by 1
minvalue 0
maxvalue 10000
cycle;

CREATE SEQUENCE sequence_pet
start with 1
increment by 1
minvalue 0
maxvalue 10000
cycle;

INSERT INTO Pet values (sequence_pet.nextval, 'Australian Shepherd', 4, 5, 5, 3, 4, 5, 4, 4, 5, 2, 3,
 'Australian Shepherds very energetic dogs. They are quite variable in temperament, 
 but these intelligent dogs can be a fun and exciting addition to your household. 
 Their energy is charming, but they do require a substantial amount of physical activity 
 and mental stimulation, making them a better fit for a more active household willing 
 to make the time commitment.', '"http://www.dogbreedchart.com/img/beagle.jpg"');




INSERT INTO Pet values (sequence_pet.nextval, 'Beagle', 5, 4, 4, 3, 5, 4, 5, 2, 1, 1, 2, 
	'Beagles are active, playful and friendly dogs. They are great with kids and a 
	convenient small size. But, don’t let their smaller size fool you, beagles still 
	equire a moderate amount of exercise or an open yard to run around in. Beagles can 
	be hard to train, so you must be diligent in training when they are puppies.', '"http://www.dogbreedchart.com/img/beagle.jpg"');

INSERT INTO Adopter values (sequence_adopter.nextval, 'steve', 22, 'single', 'apartment', 'yes', 0, 'stable', 2, 5, 'yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

UPDATE Adopter 
SET noise = 5,
	activityLevelDog = 3,
	intelligence = 3,
	hairShedding = 1,
	goodWithKids = 4,
	cuddly = 2,
	temperment = 1,
	timeCommitment = 4,
	easeToTrain = 2,
	heath = 5,
	userSize = 2
WHERE userID = (SELECT MAX(userID) from Adopter);







