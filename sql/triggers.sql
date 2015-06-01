DELIMITER //                                          --ce trigger permet d incrémenter le nombre d adhernets d un cours theorique, apres chaque inscription dans le cours et l'ajout d'un adherent à la table inscription
create trigger after_insert_inscription1 AFTER INSERT
	ON inscription FOR  EACH ROW
	BEGIN  
    UPDATE cours SET Nb_adherents = Nb_adherents + 1 WHERE id_cours = NEW.id_cours;
    END ;//

DELIMITER ;




DELIMITER //                                          --ce trigger permet d incrémenter le nombre d adhernets d un cours d instrument, apres chaque inscription dans le cours et l'ajout d'un adherent à la table apprendre
create trigger after_insert_inscription2 AFTER INSERT
	ON apprendre FOR  EACH ROW
	BEGIN  
    UPDATE instrument SET Nb_adherents = Nb_adherents + 1 WHERE ref_instrument = NEW.ref_instrument;
    END ;//

DELIMITER ;



DELIMITER //                                --ce trigger permet de décrementer le nombre d adhernets d un cours, apres chaque désinscription dU cours,C-à-d la suppression d une ligne dans la table inscription
CREATE TRIGGER AFTER_DELETE_ADHERENT AFTER DELETE ON inscription
FOR EACH ROW
BEGIN
    UPDATE cours SET Nb_adherents = Nb_adherents - 1 WHERE id_cours = OLD.id_cours;
END;//
DELIMITER ;





