<?php


namespace Vins\Platform\Bundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Vins\Platform\Bundle\Entity\Artist;

class LoadArtist implements FixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  {
    // Liste des noms de catégorie à ajouter
 
  $names = array(
      "Moore",
      "Vaughan", 
      "Ennis", 
      "Robertson",
      "Staples", 
      "Gibbons", 
      "Miller"
    );

    $firstNames = array(
      'Brian K.',
      'Allan',
      'Garth',
      'Darick',
      'Fiona',
      'Dave',
      'Frank'
    );
    $birthdates = array(
      '11-11-1954',
      '11-11-1985',
      '11-11-1970',
      '11-11-1983',
      '11-11-1989',
      '11-11-1952',
      '11-11-1965');
     

    $bios = array(
      "Brian K. Vaughan a été révélé par la série Y, le dernier homme (Y, The Last Man) créée avec Pia Guerra et publiée sous le label Vertigo de DC Comics.
      Fort de ce succès, il a été recruté par Marvel lors du lancement de sa ligne Tsunami, censée surfer sur la vague manga, pour lancer les séries Mystique et Runaways.
      Mystique, mutante métamorphe, ennemie des X-Men, sera traitée comme une série d'espionnage (en phase avec l'engouement pour des séries télé comme Alias) profitant du côté ambiguë du personnage. Brian commencera avec le dessinateur Jorge Lucas (jusqu'à l'épisode 6 US), puis Michael Ryan), avant de laisser la main à Sean Mc Keever et Manuel Garcia qui achèveront la série.
      Runaways, elle, est une création avec Adrian Alphona, qui raconte l'histoire d'un groupe d'adolescents qui fuient leurs parents criminels. Le traitement est plus que rafraîchissant, mais, malgré un succès critique, la série ne trouvera pas son public. Elle a été relancée récemment sous de meilleurs auspices.
      À côté de ces activités pour Marvel Comics, le scénariste a développé avec le dessinateur Tony Harris, la série Ex Machina, qui raconte les péripéties d'un ex-super-héros devenu maire de New York.
      Il a également été le scénariste de Ultimate X-Men, un des titres de la gamme Ultimate Marvel, qui revisite les aventures des héros de l'éditeur.
      Les travaux recensés ici sont ses plus connus, mais Vaughan a contribué à de nombreux comics, sans parler des projets à venir.
      Il a rejoint l'équipe des scénaristes de la série Lost. Il est également producteur et showrunner dans la série télévisée Under the Dome.",
      "Il nait à Northampton dans une famille modeste. Après une scolarité difficile (il est exclu de son lycée pour avoir vendu du LSD5), il monte le magazine Embryo avec des amis à l'âge de 18 ans. Il se marie en 1974 et a deux enfants. Illustrateur dans un magazine musical, Sounds, en 1979, il abandonne rapidement le dessin pour s'adonner à l'écriture.
      Il reprend Marvelman et crée V pour Vendetta dans les magazines Doctor Who Weekly et Warrior. V pour Vendetta connaitra un grand succès et obtiendra de nombreux prix dont celui de meilleur album étranger à Angoulême en 1990 et vaudra à Alan Moore d'être engagé en 1983 par l'éditeur DC Comics pour travailler sur la série The Saga of the Swamp Thing. Il revisite brillamment ce comic des années 1970 et obtient un succès retentissant.
      En 1986 il écrit les fameux Watchmen, toujours pour DC Comics. Il obtient le prix Hugo, décerné pour la première fois à une bande dessinée et obtiendra en 1989 le prix du meilleur album étranger à Angoulême.
      Alan Moore se brouille avec DC Comics, pour des raisons de droits d'auteurs notamment, en 1988 et monte sa propre maison d'édition Mad Love. Il commence alors From Hell qui obtiendra le prix de la critique à Angoulême en 2001 et sera adapté au cinéma la même année.
      En 1991 Alan Moore commence à travailler sur une BD érotique, Lost Girls, participe à un projet multimédia : The Moon and Serpent Grand Egyptian Theatre of Marvels en 1994, publie un roman intitulé Voice of the Fire en 1996.
      En 1996, encore, il reprend la série Supreme (un pseudo-Superman, initialement œuvre de Rob Liefeld) en collaboration avec les dessinateurs Joe Bennett, Alex Ross et Rick Veitch, où il continue son travail d'exploration nostalgique de l'époque de l'âge d'or des comics. Il publie aussi, toujours pour Rob Liefeld et le Studio Awesome, Judgement Day où, à l'instar d'un Crisis on Infinite Earths des années 1990, il propose de refonder tout un univers.
      En 1999 il sort la collection ABC. Elle comprend entre autres La Ligue des gentlemen extraordinaires adapté au cinéma en 2003, Top Ten, Promethea et Tom Strong. Celle-ci devait être éditée par la compagnie de Jim Lee, Wildstorm. Celle-ci ayant été vendue entre-temps à DC Comics, Alan Moore accepta plutôt de mauvaise grâce cet accord et a annoncé que l'univers du label se terminerait avec la fin du 32e épisode de Promethea.
      Jusqu'ici les films tirés de l'œuvre de Moore ont été des adaptations hollywoodiennes ayant finalement peu à voir avec l'original au point que Moore refusa même de toucher les droits sur les films tirés de ses œuvres. Il accorde peu de crédit au cinéma qui, en raison du nombre d'intervenants qu'il requiert, ne lui semble pas permettre la même liberté d'expression que l'écriture.
      En 2006, James McTeigue réalise l'adaptation de V pour Vendetta, sur un scénario des frères Wachowski. En 2009, c'est au tour de Watchmen d'être adapté sur grand écran par Zack Snyder, un premier projet d'adaptation par Terry Gilliam ayant été abandonné par le producteur Joel Silver.
      Alan Moore a reçu neuf fois le prix du meilleur scénariste aux Eisner Award depuis 1988, trois fois aux Jack Kirby Award, et sept fois aux Harvey Award. Cette liste de récompenses fait probablement de lui le scénariste le plus primé dans le domaine du comic.",
      "Son travail est reconnaissable par une violence extrême accompagnée d'un humour noir et blasphématoire (très comparable à Quentin Tarantino). Les dessinateurs avec lesquels il collabore le plus fréquemment sont Steve Dillon, Glenn Fabry, John McCrea et Darick Robertson.
      Ennis débuta sa carrière de scénariste en 1989 avec la série Troubled Souls racontant l’histoire d’un jeune protestant apolitique se retrouvant mêlé malgré lui dans le conflit irlandais. Il y eut une suite, For a Few Troubles More, puis encore une série dérivée, Dicks, publiée par Caliber en 1997.
      True Faith, un graphic novel dessiné par Warren Pleece et sorti en 1990 a fait l’objet d’un retrait des ventes, le thème de la satire religieuse n’ayant pas été apprécié par les associations religieuses. Toutefois, Vertigo en sorti une réédition en 1997.
      Puis Ennis écrivit pour 2000 AD. Il remplaça John Wagner sur sa série phare, Judge Dredd.
      La première série américaine qu’il scénarisa fut Hellblazer, chez DC Comics. Il l’écrivit jusqu’en 1994 avec Steve Dillon au dessin (C’est ce même duo qui sera à l’origine de Preacher). De 1993 à 1995, Ennis travailla avec John McCrea sur un autre titre DC, The Demon. C’est dans ce comics qu’apparut pour la première fois le tueur à gages Tommy Monaghan, plus connu sous le nom de Hitman qui eut droit à sa propre série.
      L’œuvre la plus réputée d’Ennis est sans conteste la maxi-série de 66 épisodes Preacher, qu’il cocréa avec Steve Dillon. Cette série raconte les aventures d’un prêtre possédant des pouvoirs surnaturels, à la recherche de Dieu, ce dernier ayant abandonné la Terre. Cette série a été très acclamée par tous les médias, et a connu un franc succès.
      Ennis écrivit le scénario de Hitman en même temps que Preacher. Et bien qu’Hitman ait eu une sortie plus discrète, la série dura 60 numéros de 1996 à 2001.
      En 2001, Ennis recommença à travailler sur Judge Dredd mais décida que ce serait la dernière fois qu’il s’occuperait de ce personnage.
      Ennis a travaillé ensuite chez Marvel sur la série Punisher (volume 7), 37 numéros de 2001 à 2003, il relance le personnage dans sa première action : L'élimination systématique de mafieux, mais il rajoute des éléments personnels et approfondi le caractère du héros. Puis dans Punisher Max de 2004 à 2009, il pousse un peu plus loin les excès avec des criminels plus durs. Il abandonne la série en 2008 au no 59 et termine avec ce personnage lors d'une série limitée en 6 épisodes Punisher War Zone en 2009.
      Début 2006, il lance chez l'éditeur Wildstorm la série The Boys, une violente satire des super-héros, qu'il veut encore plus extrême que Preacher. Au bout de six épisodes, le ton de la série conduit DC Comics, la maison-mère de Wildstorm, à cesser sa publication. The Boys est alors repris par un autre éditeur, Dynamite Entertainment, et dure jusqu'en 2012, s'arrêtant avec la fin du récit prévu par Ennis.
      En 2011, toujours chez Dynamite Entertainment, il écrit Jennifer Blood, dessiné par Adriano Batista. Une femme au foyer qui se transforme la nuit en vigilante extrêmement efficace et définitive.
      Parmi ses prochaines séries, on peut citer Chronicles of Wormwood, le premier arc de Midnighter (qui sera donc un spin-off de The Authority) ; une mini-série appelée Battler Briton, et il collaborerait avec John Woo pour Virgin Comics.",
      "Pour Malibu Comics, il travailla sur Night Man, c'est là qu'il rencontre Warren Ellis. Les deux hommes vont créer chez DC puis après annulation, chez Vertigo la série Transmetropolitan2 qui les fera connaitre. L'histoire de Spider Jerusalem, journaliste du futur luttant contre la corruption. La série montre déjà le goût de Ellis et de Robertson pour des personnages réalistes très ancrés dans un monde sombre et sans concessions3. Dans le même esprit, après la fin de la série, par l'intermédiaire de Warren Ellis, il rencontre Garth Ennis avec qui il collabore sous le label Marvel MAX4, sur les personnages de Nick Fury puis du Punisher. Il travaille aussi pour Marvel sur la série Wolverine et Nightcrawler.",
      "Elle est une illustratrice de bandes dessinées canadienne. Son premier travail publié apparut dans le volume collectif Hour Comics Day Highlights 2005. Elle est surtout connue pour sa participation à la série Saga, commencée en 2012.",
      "Gibbons se fit connaître assez rapidement dans le milieu des comics britannique en travaillant des titres d'action et d'horreur pour DC Thomson et IPC Media. Quand 2000 AD fut créé, Gibbons y fut nommé directeur artistique et dessina l'un des strips originaux Harlem Heroes ainsi que quelques histoires courtes. Après la première année Gibbons débarqua sur Dan Dare, un projet rêvé pour lui qui était un fan de la série originale. Gibbons dessina aussi un strip dérivé, Ro-Busters, et un couple d'histoires en deux parties de la saga originelle d'ABC Warriors. Le dernier travail de Gibbons pour 2000 AD fut la première version de Rogue Trooper dont il fut aussi le cocréateur, après quoi il se concentra pour un temps sur Doctor Who Weekly/Monthly.
      Gibbons fut l'un des talents britanniques identifiés par Len Wein en 1982 et commença à dessiner Green Lantern pour DC Comics. Il est plus connu aux États-Unis pour avoir collaboré avec Alan Moore sur Watchmen. Parmi les fans de Doctor Who il est connu pour avoir dessiné des épisodes originaux de la série chaque semaine dans le Doctor Who Weekly/Monthly des numéros du #1 aux #69.
      Son plus récent travail (2005) est un roman graphique en noir et blanc qu'il a dessiné, The Originals. Publié par Vertigo, cette œuvre se déroule dans le futur proche, mais son graphisme est fortement influencé par l'imagerie jeunes branchés anglais et rockeurs des années 1960.
      Ses projets en cours comprennent les mini-séries de DC Comics The Rann/Thanagar War (qui est liée à la mini-série événement à venir Infinite Crisis) et Green Lantern Corps: Recharge. Gibbons a aussi fourni les couvertures d'Albion, série Wildstorm baséee sur une trame d'Alan Moore et écrit par sa fille Leah et son mari.",
      "Frank Miller naît le 27 janvier 1957 à Olney dans le Maryland mais grandit à Montpelier, dans le Vermont. Il commence sa carrière dans les comics en septembre 1978 en dessinant le numéro 84 du comics The Twilight Zone adaptation en bande dessinée de la série télévise homonyme, pour l'éditeur Gold Key. Il travaille ensuite sur des comics de guerre chez DC Comics (Weird War Tales 64 et 68, The Unknown Soldier 219) puis passe chez Marvel Comics où il réalise de nombreux comics (Warlord of Mars 18, Spectacular Spider-Man 27 et 28, plusieurs Marvel Team-Up, etc.)1. Il est bientôt nommé dessinateur de Daredevil, série dont il ne tarde pas à devenir aussi le scénariste. Le passage de Miller sur Daredevil est salué par le public et par la critique. Il crée le personnage d'Elektra et met en place de nombreux éléments dans l'univers de l'homme sans peur que l'on peut retrouver, entre autres, dans le film de 2003. L'époque Miller de « Daredevil » dure le temps de 42 épisodes qui redéfinissent radicalement non seulement le personnage mais l'ensemble de la production des comics des années 1980. Le summum est atteint par le cycle « Renaissance » (Born Again) écrit par Miller et dessiné par David Mazzucchelli en 1985.
      Frank Miller scénarise et dessine en 1986 Batman: Dark Knight (The Dark Knight Returns), une histoire glauque de Batman située dans un futur proche. Il y met en scène un Batman violent et extrémiste et met à mal le mythe du justicier détective. Miller réalise plus tard une suite de cette œuvre, Batman: The Dark Knight Strikes Again (ou DK2).
      En plus de travailler sur les personnages des grandes compagnies de comics, Miller créé ses propres séries : les séries de science-fiction Ronin (éditée par DC), Martha Washington avec Dave Gibbons, Big Guy And Rusty The Boy Robot et Hard Boiled avec Geoff Darrow, les séries de l'univers roman noir de Sin City ou la série historique 300 (tous édités par Dark Horse).
      Frank Miller a aussi écrit quelques scénarios pour le cinéma, en particulier ceux de RoboCop 2 et RoboCop 3. Il a coréalisé avec Robert Rodríguez l'adaptation au grand écran de Sin City en 2005, ainsi que sa suite Sin City : J'ai tué pour elle en 2014. Il prépare actuellement la troisième adaptation de la série, celle-ci devrait sortir d'ici 20172.
      En 2005, il lance sous le nouveau label All-Star de DC, la série All-Star Batman and Robin The Boy Wonder, dessinée par Jim Lee, mettant en scène la formation de Robin par Batman. Bien que située en dehors de la continuité officielle du personnage, elle s'intègre selon ses propres dires dans le cadre des aventures de Batman qu'il a écrites, à la suite de Batman : Année Une, un arc de la série Batman (#404-407, 1987) illustré par David Mazzucchelli traitant des débuts de Batman.
      En 2007, grâce à l'énorme succès des deux films adaptés de son œuvre Sin City et de 300, il se lance dans l'adaptation de la bande dessinée Le Spirit de Will Eisner. Le film, The Spirit, avec Gabriel Macht dans le rôle du justicier du même nom, est sorti au cinéma en fin 2008.
      En 2010, il réalise la publicité du parfum Gucci Guilty pour Gucci avec Evan Rachel Wood et Chris Evans."
    );

    foreach ($firstNames as $key => $name) {
      $artist = new Artist();
      $artist->setFirstName($firstNames[$key]);
      $artist->setName($names[$key]);
      $artist->setBiography($bios[$key]);
      $artist->setBirthDate( new \DateTime($birthdates[$key]) ) ;
      
      // On la persiste
      $manager->persist($artist);
    }

    // On déclenche l'enregistrement de toutes les catégories
    $manager->flush();
  }
}