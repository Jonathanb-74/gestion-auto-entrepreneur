# Gestion auto entrepreneur

<p align="center">
    <img src="https://github.com/Jonathanb-74/gestion-auto-entrepreneur/blob/master/.documentation/logo.png" alt="Logo application" width="415" data-align="center">
    <br>
    <span style="margin-left: 5px; margin-right: 5px;"><a href="https://www.gnu.org/licenses/quick-guide-gplv3.fr.html"><img src="https://img.shields.io/badge/LICENCE-GPL%20v3-red" alt="GPL v3"></a></span><span style="margin-left: 5px; margin-right: 5px;"><a href="https://app.fossa.com/projects/git%2Bgithub.com%2FJonathanb-74%2Fgestion-auto-entrepreneur?ref=badge_shield" alt="FOSSA Status"><img src="https://app.fossa.com/api/projects/git%2Bgithub.com%2FJonathanb-74%2Fgestion-auto-entrepreneur.svg?type=shield"/></a></span>
    <br>
    <span>Par <a href="http://jonathan-brea.fr">Jonathan BREA</a></span>
</p>

## Sommaire

1. [Présentation](#présentation)

2. [Installation](#installation)
   
   1. [Prérequis](#Prérequis)
   
   2. [Téléchargement des fichiers](#Téléchargement-des-fichiers)
   
   3. [Création de la base de données à l'aide de phpMyAdmin](#création-de-la-base-de-données-à-laide-de-phpmyadmin)

3. [Configuration de l'application](#configuration-de-lapplication)
   
   1. [Connexion à la base de données](#connexion-à-la-base-de-données)
   
   2. [Saisie des informations de l'entreprise](#saisie-des-informations-de-lentreprise)
   
   3. [Configuration des types d'activités](#configuration-des-types-dactivités)
   
   4. [Configuration des moyens de paiement](#configuration-des-moyens-de-paiement)
   
   5. [Configuration du thème](#configuration-du-thème)
   
   6. [Configuration des mails](#configuration-des-mails)

4. Crédits

## Présentation

Cette application web à pour but de faciliter la gestion administrative d'un auto entrepreneur. 

Cette application sous forme de site web permet d'être simplement utilisée sur PC, tablette et smartphone via un navigateur.

Après avoir créé vos produits et vos clients, vous pourrez utiliser le gestionnaire de prestation, pour garder une trace de votre travail. De plus cette application vous permet de générer automatiquement des devis et des factures et si vous le souhaitez, les envoyer par mail de manière simple.

## Installation

### Prérequis:

Cette application à besoin d'un serveur web et d'une base de données pour 
fonctionner.

Si vous disposez d'un hébergement en ligne et que les caractéristiques le 
permettent (création de sous domaines, création de bases de données), vous 
pouvez héberger votre application en ligne. Cette méthode vous permet d'avoir 
accès à l'application depuis n'importe où dans le monde (vous devez avoir accès 
à internet).

Si vous ne disposez pas de serveur web, vous pouvez en installer un sur votre 
PC de travail. Cette manipulation est très simple. Je vous conseille WAMP (ou XAMPP), cette solution permet d'installer le serveur WEB ainsi que le serveur de base de 
données via une seule application. Vous trouverez un grand nombre de tuto et docs sur internet pour vous expliquer leurs fonctionnements.

## Téléchargement des fichiers

### Si vous êtes sur Windows et que vous utilisez WAMP (ou XAMPP) ou un hébergement PRO (ex: OVH)

En premier, vous devez télécharger l'archive contenant les fichiers sources: 

1. Utilisez le bouton (vert) "**Clone or download**" en haut de la liste des fichiers.

2. Sélectionnez "**Download ZIP**".

3. Enregistrez l'archive dans le répertoire de votre choix.

4. Décompressez l'archive.

5. Placez tous les fichiers dans le répetoire de votre serveur web
   
   1. Si vous utilisez WAMP, vous devez placer les fichiers dans  `C:\wamp64\www\`
   
   2. Si vous utilisez XAMPP, vous devez placer les fichiers dans `c:\xampp\htdocs\`
   
   3. Si vous utilisez un hébergement en ligne, la manipulation varie en fonction de l'hébergeur, vous devez vous renseigner sur la parche à suivre.

## Création de la base de données à l'aide de phpMyAdmin

phpMyAdmin est une application web qui permet de gérer vos bases de données de manière graphique via une page web. Si vous utilisez WAMP (ou XAMPP), cet outil est déjà installé. Si vous utilisez un hébergeur en ligne, cette manipulation sera peut-être différente. 

1. Connectez-vous à phpMyAdmin via un navigateur à l'adresse: `localhost/phpmyadmin`
   
   1. Si vous devez vous connecter, saisissez `root` dans utilisateur et ne saisissez pas de mot de passe.

2. Maintenant, vous devez créer un utilisateur et une base de données spécifique à l'application:
   
   1. Dans le menu en haut de la page sélectionnez `Comptes utilisateurs`, puis dans la page qui s'ouvre, `Ajouter un compte utilisateur`.
      
      <p align="center">
          <img title="" src="https://github.com/Jonathanb-74/gestion-auto-entrepreneur/blob/master/.documentation/pmaCreationUtilisateurBtn1.PNG" alt="Btn création utilisateur 1" width="300" data-align="center">
          <br><br>
          <img title="" src="https://github.com/Jonathanb-74/gestion-auto-entrepreneur/blob/master/.documentation/pmaCreationUtilisateurBtn2.PNG" alt="Btn création utilisateur 2" width="300" data-align="center">
      </p>
   
   2. Saisissez un nom d'utilisateur (ex: `gestion-micro-entreprise`, `gestio`, `gme`), un mot de passe (vous pouvez générer un mot de passe aléatoire, ce mot de passe ne sera à saisir qu'une seule fois), enfin cochez la case `Créer une base portant son nom ...`.  **<u>ATTENTION:</u> ces informations sont très importantes, gardez-les dans un bloc-notes pour la suite.**
      
      <p align="center">
          <img title="" src="https://github.com/Jonathanb-74/gestion-auto-entrepreneur/blob/master/.documentation/pmaFormCreationUtilisateur.png" alt="Formulaire de création de l'utilisateur" width="800" data-align="center">
      </p>
   
   3. Après avoir créé la BDD, cliquez sur celle-ci dans la liste de gauche, puis sélectionnez `Importer` dans le menu en haut de la page.
   
   4. Utilisez le bouton `Parcourir ...` pour sélectionner le fichier `BDD.sql` obtenu lors du téléchargement des fichiers.
      
      <p align="center">
          <img title="" src="https://github.com/Jonathanb-74/gestion-auto-entrepreneur/blob/master/.documentation/pmaImporter.png" alt="Importation de la structure de la BDD" width="800" data-align="center">
      </p>
   
   5. Puis cliquez sur `Exécute` en bas de la page.
   
   6. Si aucune erreur n'apparaît, vous avez terminé cette étape, sinon renseignez vous sur internet pour résoudre l'erreur. 

## Configuration de l'application

Maintenant vous pouvez procéder à la configuration de l'application.

### Connexion à la base de données

1. Connectez-vous à l'application web via un navigateur à l'adresse: `localhost`

2. Si tout s'est bien passé, vous devriez arriver sur une page nommée: `Installation de la BDD`
   
   <p align="center">
          <img title="" src="https://github.com/Jonathanb-74/gestion-auto-entrepreneur/blob/master/.documentation/appInstallBdd.png" alt="Page de configuration de la BDD" width="800" data-align="center">
      </p>

3. Le formulaire de cette page vous permet de connecter la base de données précédemment installée à l'application
   
   1. Saisissez l'adresse du serveur, si vous utilisez WAMP (ou XAMPP) saisissez `localhost`, si vous utilisez un hébergement en ligne renseignez-vous sur l'adresse du serveur.
   
   2. Pour l'utilisateur et la base de données, saisissez le nom d'utilisateur que vous avez créé sur phpMyAdmin à l'étape précédente. Enfin, saisissez le mot de passe
   
   3. Terminez par `Valider`.
   
   4. Si aucune erreur n'apparaît, vous avez terminé cette étape, sinon renseignez vous sur internet pour résoudre l'erreur.

### Saisie des informations de l'entreprise

<p align="center">
 <img title="" src="https://github.com/Jonathanb-74/gestion-auto-entrepreneur/blob/master/.documentation/appInstallEntrepriseInfo.png" alt="Page de configuration des informations de l'entreprise" width="800" data-align="center">
 </p>

<u>ATTENTION:</u> ces informations sont très importantes, elles serviront pour la création des factures. Vérifiez bien avant de valider, certaines infirmations comme le numéro SIRET ne sont pas modifiables.

- L'adresse email sera utilisée lorsqu'un client souhaite répondre à un email envoyé depuis l'application.

- Vous devez saisir au moins un des deux numéros de téléphone.

- Terminez par `Valider`

- Si aucune erreur n'apparaît, vous avez terminé cette étape, sinon renseignez vous sur internet pour résoudre l'erreur.

**<u>À parir de cette étape, vous avez accès à l'application, cependant vous devez encore configurer quelques points de l'application</u>**

### Configuration des types d'activités

Dans le menu de configuration, allez sur `Liste des activités`.

Dans cette partie, vous devez renseigner les catégories d'activités dans la catégorie associée. Cette partie est importante, car elle pourrait fausser les résumés par la suite.

#### Exemples:

- **Libérale**: création, conseils, formation

- **Artisanale**: maintenance, installation

- **Commerciale**: vente, revente

Si vous ne savez pas quoi saisir, renseignez-vous en fonction de votre activité.

### Configuration des moyens de paiement

Dans le menu de configuration, allez sur `Moyens de paiement`.

Ici vous pouvez saisir les moyens de payements que vous acceptez, seul le nom apparaît sur la facture.

### Configuration du thème

Dans le menu de configuration, allez sur `Thème`.

Sur cette page vous pouvez configurer l'apparence de l'application comme vous le souhaitez. 

N'oubliez pas de `Valider` pour appliquer les paramètres. Au besoin, rechargez la page si les modifications ne font pas visibles après avoir validé.

### Configuration des mails

Dans le menu de configuration, allez sur `Email de notifications`.

#### Configuration du serveur d'envoi

Dans la première partie de cette page, vous allez devoir configurer les paramètres de votre serveur de messagerie pour envoyer des mails depuis l'application.

Cette manipulation est spécifique à chacun, vous devez vous renseigner sur la documentation de votre hébergeur pour trouver les paramètres à utiliser.

> ##### Documentation:
> 
> OVH: [Configurer son adresse e-mail sur Outlook 2016 pour Windows | Documentation OVH](https://docs.ovh.com/fr/emails/configuration-outlook-2016/)
> 
> 1&1 - IONOS: [Paramètres de votre programme de messagerie (IMAP & POP3) - IONOS Assistance](https://www.ionos.fr/assistance/email/11-ionos-gerer-le-courrier-de-base/parametres-pour-votre-programme-de-messagerie-imap-pop3/)
> 
> GMAIL: [Envoyer des e-mails depuis une imprimante, un scanner ou une application - Aide Administrateur G Suite](https://support.google.com/a/answer/176600?hl=fr)

Si vous utilisez <u>une adresse Gmail avec la double authentification activée</u>, consultez cette documentation qui vous perméttra de vous connecter sans la double authentification: [se connecter avec un mot de passe d'application - Aide Compte Google](https://support.google.com/accounts/answer/185833?hl=fr)

Une fois les paramètres enregistrés, vous pouvez envoyer un email de test, si le message `succès` s'affiche en haut de la page, vous devriez recevoir un email sur l'adresse email saisie lors de la configuration. Si une erreur apparait, vérifiez vos paramètres et recommencez. 

#### Configuration des emails "types"

Dans les deux autres parties de la page, vous pouvez configurer le sujet et le contenu type lors de l'envoi de documents. Vous pouvez utiliser des variables (dans le sujet et le contenu), elles seront automatiquement remplacées par les véritables informations (en fonction du client, de la prestation et du document) lors du chargement de la page d'envoi. Si vous le souhaitez, vous pourrez adapter le contenu du texte avant l'envoi.

##### Voici les variables utilisables

<table style="width: 100%;">
    <thead >
        <tr>
            <th style="width: 50%;">Variable</th>
            <th style="width: 50%;">Affichage</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{documentNumero}</td>
            <td>Numéro du document</td>
        </tr>
        <tr>
            <td>{documentDateEdition}</td>
            <td>Date d'émission du document</td>
        </tr>
        <tr>
            <td>{prestationOuverture}</td>
            <td>Date d'ouverture de la prestation</td>
        </tr>
        <tr>
            <td>{prestationFacturation}</td>
            <td>Date de facturation</td>
        </tr>
        <tr>
            <td>{prestationLivraison}</td>
            <td>Date de livraison</td>
        </tr>
        <tr>
            <td>{prestationCloture}</td>
            <td>Date de clôture</td>
        </tr>
        <tr>
            <td>{prestationCommentaire}</td>
            <td>Commentaire de la prestation</td>
        </tr>
        <tr>
            <td>{prestationMoyenPaiement}</td>
            <td>Moyen de paieent de la prestation</td>
        </tr>
        <tr>
            <td>{clientNom}</td>
            <td>Nom du client</td>
        </tr>
        <tr>
            <td>{clientEmail}</td>
            <td>Adresse email du client</td>
        </tr>
        <tr>
            <td>{clientAdresse}</td>
            <td>Adresse du client</td>
        </tr>
        <tr>
            <td>{clientCP}</td>
            <td>Code postale du client</td>
        </tr>
        <tr>
            <td>{clientVille}</td>
            <td>Ville du client</td>
        </tr>
        <tr>
            <td>{clientPays}</td>
            <td>Pays du client</td>
        </tr>
        <tr>
            <td>{clientTelFixe}</td>
            <td>Téléphone fixe du client</td>
        </tr>
        <tr>
            <td>{clientTelPortable}</td>
            <td>Téléphone portable du client</td>
        </tr>
    </tbody>
</table>

## Crédits

### [CKeditor](https://ckeditor.com/ckeditor-5/)

Edition des mails.

### [JPgraph](https://jpgraph.net/)

Génération des graphiques.

### [Dompdf](https://github.com/dompdf/dompdf)

Génération des documents (devis & factures) au format PDF.

### [PHPmailer](https://github.com/PHPMailer/PHPMailer)

Envoi des emails avec authentification sur un serveur SMTP.

## Licence

[![FOSSA Status](https://app.fossa.com/api/projects/git%2Bgithub.com%2FJonathanb-74%2Fgestion-auto-entrepreneur.svg?type=large)](https://app.fossa.com/projects/git%2Bgithub.com%2FJonathanb-74%2Fgestion-auto-entrepreneur?ref=badge_large)

## Contribuer

### Me contacter

contact@jonathan-brea.fr

### Soutenir

<p align="center">
    <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=YRFF8YJ93HE68&source=url"><img src="https://www.paypalobjects.com/fr_FR/FR/i/btn/btn_donateCC_LG.gif" alt="GPL v3"></a>
</p>