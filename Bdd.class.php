<?php 
	
	abstract class Bdd {

		private static $pdo;

		protected function getPDO() {
			if( self::$pdo === null ) {
				self::$bdd = new PDO('mysql:host=localhost;dbname=covid_market', 'root', '' );
			}
			return self::$pdo;
		}

		public function getListe( $table ) {
			$requete = $this->getPDO()->query("SELECT * FROM $table");
			return $requete->fetchAll( PDO::FETCH_CLASS );
		}

		public function getDetails( $table, $id ) {
			$requete = $this->getPDO()->query("SELECT * FROM $table WHERE id = ". $id);
		
			return $requete->fetch( PDO::FETCH_ASSOC );
		}

		public function deleteFiche( $table, $id ) { 
			$requete = $this->getPDO()->exec("DELETE FROM $table WHERE id = ". $id);
			
			return true;
		}

		abstract public function createFiche( $data );

		abstract public function updateFiche( string $donnees_du_formulaire, $id );


	}