-- Table Coach
INSERT INTO `Coach` (`username`, `password`) VALUES ('Anas', 'test');

-- Table parametre
INSERT INTO `Parameter` (`name`, `pValue`) VALUES ('mail', 'amiria@3il.fr');
INSERT INTO `Parameter` (`name`, `pValue`) VALUES ('tel', '06 06 06 06 06');
INSERT INTO `Parameter` (`name`, `pValue`) VALUES ('address', '5 Rue de Bruxelles, 12000 Rodez');
INSERT INTO `Parameter` (`name`, `pValue`) VALUES ('facebook', 'https://www.facebook.com/');
INSERT INTO `Parameter` (`name`, `pValue`) VALUES ('instagram', 'https://www.instagram.com/');
INSERT INTO `Parameter` (`name`, `pValue`) VALUES ('twitter_x', 'https://x.com/');
INSERT INTO `Parameter` (`name`, `pValue`) VALUES ('phraseAccroche', "Envie de soulever le poids de vos ambitions ? Chez Braxters, la force d'Atlas est à votre portée !");
INSERT INTO `Parameter` (`name`, `pValue`) VALUES ('description', "Bienvenue à Braxters, la salle de sport qui allie puissance et légende ! Ici, chaque entraînement est une épopée où l’endurance, la force et le courage sont mis à l'épreuve. Dans un cadre inspiré des plus grands mythes, vous trouverez tout ce qu’il faut pour atteindre vos objectifs : équipements de pointe, programmes sur mesure et ambiance de défi. Venez, et laissez-nous vous accompagner dans cette quête pour devenir la meilleure version de vous-même !");
INSERT INTO `Parameter` (`name`, `pValue`) VALUES ('motivation', "Affrontez votre propre Odyssée, adoptez l'héroïsme d'Achille, et embrassez la force des Titans ! Chez Braxters, chaque programme vous pousse à conquérir vos propres défis et à écrire votre propre légende. Que votre parcours soit digne des plus grands héros grecs !");
INSERT INTO `Parameter` (`name`, `pValue`) VALUES ('callToAction', "Forgez votre destinée chez Braxters !");
INSERT INTO `Parameter` (`name`, `pValue`) VALUES ('followSocialMedia', "Suivez nos exploits et rejoignez notre ascension vers l’Olympe !");

-- Table Machine
INSERT INTO Machine (name, picture, type) VALUES
                                              ('Abdominaux', 'abdominaux.avif', 'Musculation'),
                                              ('Butterfly', 'buterfly.avif', 'Musculation'),
                                              ('Leg Press', 'legpress.avif', 'Musculation'),
                                              ('Pectoraux', 'pectoraux.avif', 'Musculation'),
                                              ('Poulie', 'poulie.avif', 'Musculation'),
                                              ('Rameur', 'rameur.avif', 'Cardio'),
                                              ('Squat', 'squat.avif', 'Musculation'),
                                              ('Tapis de Course', 'tapis_course.avif', 'Cardio'),
                                              ('Traction', 'traction.avif', 'Musculation'),
                                              ('Vélo', 'velo.avif', 'Cardio');

-- Table Program
INSERT INTO Program (name, motif, description, type, picture) VALUES
                                                                  ("Odyssée d'Ulysse", "Endurance et résilience à la manière d'Ulysse, prêt pour tous les défis.", "Inspiré par Ulysse, symbole de persévérance et de résilience, ce programme aide les membres à construire leur endurance pour un voyage de long terme, comme celui d’Ulysse dans l’Odyssée. Parfait pour ceux qui veulent améliorer leur endurance cardio-respiratoire, ce programme met l’accent sur la constance et la progression dans l’effort.", "Cardio", "odyssee_d_ulysse.avif"),

                                                                  ("Héroïsme d'Achille", "Force et agilité, tel Achille sur le champ de bataille.", "Achille, le guerrier aux capacités équilibrées en force et agilité, inspire ce programme polyvalent. Il combine endurance, cardio et musculation pour ceux qui recherchent un équilibre parfait entre puissance et résistance. Ce programme convient aux athlètes qui veulent un entraînement complet, aussi polyvalent et robuste que l'héroïsme d'Achille.", "Mixte", "heroisme_d_achille.avif"),

                                                                  ("Force des Titans", "Puissance inébranlable, digne des Titans.", "Inspiré par les puissants Titans, ce programme est conçu pour les amateurs de musculation pure. Axé sur la force brute et la résistance maximale, il vise à construire une puissance physique légendaire. Chaque séance est une épreuve de force, permettant de repousser ses limites et de bâtir une musculature digne des géants de la mythologie.", "Musculation", "force_des_titans.avif");

INSERT INTO Exercice (duration, repetition, rest, id_machine) VALUES
                                                                  (45, 3, 60, 1),  -- Exercice d'abdominaux, 3 séries de 45 secondes avec 60s de repos
                                                                  (60, 4, 45, 2),  -- Exercice de butterfly, 4 séries de 60 secondes avec 45s de repos
                                                                  (90, 3, 90, 3),  -- Exercice de leg press, 3 séries de 90 secondes avec 90s de repos
                                                                  (30, 5, 30, 4),  -- Exercice de pectoraux, 5 séries de 30 secondes avec 30s de repos
                                                                  (120, 3, 60, 5), -- Exercice de poulie, 3 séries de 120 secondes avec 60s de repos
                                                                  (45, 4, 60, 6),  -- Exercice de rameur, 4 séries de 45 secondes avec 60s de repos
                                                                  (60, 4, 45, 7),  -- Exercice de squat, 4 séries de 60 secondes avec 45s de repos
                                                                  (30, 3, 30, 8),  -- Exercice de tapis de course, 3 séries de 30 secondes avec 30s de repos
                                                                  (90, 2, 60, 9),  -- Exercice de traction, 2 séries de 90 secondes avec 60s de repos
                                                                  (60, 3, 45, 10); -- Exercice de vélo, 3 séries de 60 secondes avec 45s de repos

INSERT INTO Entrainement (id_program, id_exercice) VALUES
                                                       (1, 1), -- L'exercice d'abdominaux pour le programme Odyssée d'Ulysse
                                                       (1, 6), -- L'exercice de rameur pour le programme Odyssée d'Ulysse
                                                       (2, 2), -- L'exercice de butterfly pour le programme Héroïsme d'Achille
                                                       (2, 3), -- L'exercice de leg press pour le programme Héroïsme d'Achille
                                                       (2, 7), -- L'exercice de squat pour le programme Héroïsme d'Achille
                                                       (3, 4), -- L'exercice de pectoraux pour le programme Force des Titans
                                                       (3, 5), -- L'exercice de poulie pour le programme Force des Titans
                                                       (3, 9), -- L'exercice de traction pour le programme Force des Titans
                                                       (3, 10); -- L'exercice de vélo pour le programme Force des Titans
