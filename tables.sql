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
	health Integer,
	userSize Integer
);


CREATE TABLE Pet 
(
	breed VARCHAR(35) Primary key,
	noise Integer,
	activityLevelDog Integer,
	intelligence Integer,
	hairShedding Integer,
	goodWithKids Integer,
	cuddly Integer,
	temperment Integer,
	timeCommitment Integer,
	easeToTrain Integer,
	health Integer,
	petSize Integer,
	description VARCHAR(500),
	photo VARCHAR(400)
);

CREATE TABLE Match 
(
	userID VARCHAR(5), 
	breed VARCHAR(35),
	matchPercentage Integer,
	Foreign Key(userID) REFERENCES Adopter(userID),
	Foreign Key(breed) REFERENCES Pet(breed)
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

INSERT INTO Pet values ('Brittany Spaniel', 3, 5, 5, 3, 5, 5, 5, 3, 3, 4, 3, 'Brittany Spaniels are great companions with lots of energy. They are medium in size and known for their happy personality! These dogs are smart and healthy, and they are perfect with other dogs and kids!', '"http://dogbreedchart.com/img/brittany.jpg"');  
INSERT INTO Pet values ('Chihuahua', 3, 3, 4, 2, 5, 5, 5, 4, 4, 2, 1, 'If you are looking for a small and affectionate lapdog, then consider a chihuahua! Despite their size, they are courageous and big barks! They may not like long walks, but they are perfect for cuddling.', '"http://dogbreedchart.com/img/chihuahua.jpg"');  
INSERT INTO Pet values ('Dachshund', 5, 3, 4, 3, 5, 4, 4, 3, 2, 2, 1, 'These short-legged long-body are known for their clever and lively personality. Dachshunds are stubborn, but love to play and spend time with their owners.', '"http://dogbreedchart.com/img/dachshund.jpg"'); 
INSERT INTO Pet values ('Havanese', 2, 3, 4, 2, 4, 5, 4, 4, 5, 3, 2, 'Havanese are very soft dogs who are also hypoallergenic! While they require some maintenance from a groomer, they are very affectionate and intelligent. They are gentile with other dogs and people and would be great with kids.', '"http://dogbreedchart.com/img/havanese.jpg"');
INSERT INTO Pet values ('Jack Russell Terrier', 4, 5, 5, 3, 4, 4, 4, 3, 4, 4, 2, 'Jack Russell terriers are small to medium size terriers who are known for their stubborn and energetic nature. They are loud barkers and athletic partners. If you like playing outside for hours, these dogs are the perfect partner for you!', '"http://www.dogbreedchart.com/img/jack-russell-terrier.jpg"' );
INSERT INTO Pet values ('Labrador Retriever', 4, 5, 5, 5, 4, 4, 5, 2, 5, 3, 4, 'Labrador Retrievers are larger dogs that are full of energy! Known for their kind temperament, they are friendly and energetic with just about everyone. They are also one of the most popular dog breeds in the world!', '"http://dogbreedchart.com/img/labrador-retriever.jpg"');
INSERT INTO Pet values ('Mastiff', 2, 3, 2, 3, 5, 5, 5, 3, 3, 3, 5, 'If you are looking for an extremely large dog, then a mastiff may be right for you! They are good natured and affectionate dogs but are less energetic than other dogs of their size. They are very protective and loyal dogs who can be good guards.', '"http://dogbreedchart.com/img/mastiff.jpg"');
INSERT INTO Pet values ('Pomeranian', 5, 3, 4, 4, 2, 3, 2, 4, 4, 3, 1, 'Pomeranians are small fluffballs that love to cuddle! They are sociable dogs who bark frequently but are friendly and active despite their size. They are good companions who love to be pet and spend time inside.', '"http://dogbreedchart.com/img/pomeranian.jpg"');
INSERT INTO Pet values ('Standard Schnauzer', 2, 5, 5, 1, 4, 3, 4, 4, 3, 5, 3, 'Standard Schnauzers are hypoallergenic dogs who are easily trained. They are good-natured and intelligent friends who love to play with their owners. They are also known for their devoted and loyal personality.', '"http://dogbreedchart.com/img/standard-schnauzer.jpg"');
INSERT INTO Pet values ('English Springer Spaniel', 3, 5, 5, 3, 5, 4, 5, 4, 5, 3, 3, 'English Springer Spaniels are medium sized companions who are known for being affectionate. Despite their size, they love to cuddle with owner and go on walks. They are intelligent friends who are also protective and alert.', '"http://dogbreedchart.com/img/english-springer-spaniel.jpg"');
INSERT INTO Pet values ('Australian Shepherd', 4, 5, 5, 3, 4, 5, 4, 4, 5, 2, 3, 'Australian Shepherds very energetic dogs. They are quite variable in temperament, but these intelligent dogs can be a fun and exciting addition to your household. Their energy is charming, but they do require a substantial amount of physical activity and mental stimulation, making them a better fit for a more active household willing to make the time commitment.', '"http://www.dogbreedchart.com/img/australian-shepherd.jpg"');     
INSERT INTO Pet values ('Beagle', 5, 4, 4, 3, 5, 4, 5, 2, 1, 1, 2, 'Beagles are active, playful and friendly dogs. They are great with kids and a convenient small size. But, don’t let their smaller size fool you, beagles still require a moderate amount of exercise or an open yard to run around in. Beagles can be hard to train, so you must be diligent in training when they are puppies.', '"http://www.dogbreedchart.com/img/beagle.jpg"');    
INSERT INTO Pet values ('Bernese Mountain Dog', 3, 4, 4, 5, 5, 5, 5, 4, 4, 3, 5, 'Bernese Mountain Dogs are friendly and loving. This breed makes a good watchdog because of their deep, loud bark. Their affectionate nature makes them great for emotional support dogs as well. They can make a great companion, but first time dog owners should be careful not to overlook their size, shedding, and energy levels, which can make ownership more of a commitment.', '"http://www.dogbreedchart.com/img/bernese-mountain-dog.jpg"');     
INSERT INTO Pet values ('Maltese', 4, 3, 4, 1, 3, 5, 3, 4, 3, 3, 1, 'Maltese are lively, playful, and great for small spaces. Although gentle, they are not recommended for homes with young children. Be careful to train them well because they may become spoiled, yappy, and aggressive with non-family members. Maltese love attention and can make a great lap dog, but often exhibit symptoms of separation anxiety when left alone for long periods of time.', '"http://www.dogbreedchart.com/img/maltese.jpg"');      
INSERT INTO Pet values ('Goldendoodle', 2, 4, 5, 1, 5, 5, 5, 3, 5, 4, 4, 'Goldendoodles are a fluffy, hypoallergenic hybrid with the playfulness and kindness of a Golden Retriever and the intelligence and athleticism of a Poodle. Goldendoodles are exceptionally well behaved, but do require a moderate amount of exercise. They are very affectionate, making them perfect for a family or anyone seeking companionship, but they do not like to be separated from their companions for long periods of time.', '"http://www.dogbreedchart.com/img/goldendoodle.jpg"' );       
INSERT INTO Pet values ('Great Pyrenees', 4, 5, 4, 5, 5, 5, 4, 4, 2, 2, 5, 'Great Pyrenees are a very large, yet majestic looking breed. They are loyal and playful, but, bred as a livestock guardian, they can be territorial towards strangers. They have a strong, protective bark, which makes them a great watchdog. With good training and adequate grooming, these dogs can be a great addition to your family.', '"http://www.dogbreedchart.com/img/great-pyrenees.jpg"');     
INSERT INTO Pet values ('Newfoundland', 3, 3, 4, 5, 5, 5, 5, 3, 5, 2, 5, 'Newfoundland dogs are large, playful, and furry dogs that resemble bears, but sweetness and gentleness are the hallmark of the breed. They are generally quiet, especially compared to other large breeds. They make great companions, but for these same reasons they do not like to be left alone for long periods of time. Newfoundlands love to swim and romp around, so it is best to take them on long walks and provide an adequate sized backyard for them.', '"http://www.dogbreedchart.com/img/newfoundland.jpg"');      
INSERT INTO Pet values ('Poodle', 4, 4, 5, 1, 5, 4, 5, 4, 5, 2, 4, 'Poodles are best known for their intelligence, athleticism and low shedding. They are very easy to train and very eager to please. Poodles are very attentive and obedient to their owners, but they also need substantial mental stimulation and physical activity in order to stay occupied, which could be challenging for a new pet owner.', '"http://www.dogbreedchart.com/img/poodle.jpg"');      
INSERT INTO Pet values ('Rottweiler', 4, 4, 5, 4, 2, 2, 4, 5, 4, 2, 4, 'Rottweilers are a calm, confident, and courageous dog breed. This muscular dog needs space, exercise, and mental stimulation. With good training, socialization, and an assertive owner, this dog breed can make a great companion, but they are not recommended for first time owners because they are inclined towards dominance, which can lead to aggression if not trained properly.', '"http://www.dogbreedchart.com/img/rottweiler.jpg"');    
INSERT INTO Pet values ('Vizsla', 5, 5, 4, 2, 5, 5, 5, 4, 5, 4, 4, 'Vizslas are known for being athletic, agile, and affectionate. They have been referred to as “velcro dogs” because they are always at their owner’s side. This breed gets along well with all people and all animals, making them a great option for households with young children and other pets. This breed does, however, require adequate socialization as a puppy to build its confidence, along with vigorous exercise and a lot of personal attention.', '"http://www.dogbreedchart.com/img/vizsla.jpg"');

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
	health = 5,
	userSize = 2
WHERE userID = (SELECT MAX(userID) from Adopter);

select userId, breed, matchpercentage 
from match 
where userID = (SELECT MAX(userID) from Adopter) AND Rownum <=5
order by matchpercentage;







