# Pour configurer un serveur SMTP avec WAMPServeur

- Dézipper le fichier 'sendmail.zip' dans "C:\wamp64\serveur_mail"
- Modifier le fichier 'sendmail.ini' :
> Si vous voulez, j'ai fais un mail pour Intera Notes :  
> Mail : developpement_web@laposte.net | Mot de passe : @developpementWeb87

```shell
smtp_server=LE_SERVEUR_SMTP
;exemple : smtp.laposte.net / smtp.gmail.com

; smtp port (normally 25)

smtp_port=465

smtp_ssl=ssl

default_domain=localhost

auth_username=MAIL_D_ENVOI
auth_password=MOT_DE_PASSE

force_sender=MAIL_D_ENVOI
```

- Modifier le fichier 'C:\wamp64\bin\apache\apache2.4.27\bin\php' (_garre aux points virgules !_):
```shell
[mail function]
; For Win32 only.
; http://php.net/smtp
;SMTP = localhost
; http://php.net/smtp-port
;smtp_port = 25

; For Win32 only.
; http://php.net/sendmail-from
;sendmail_from ="admin@wampserver.invalid"

; For Unix only.  You may supply arguments as well (default: "sendmail -t -i").
; http://php.net/sendmail-path
sendmail_path = "C:\wamp64\serveur_mail\sendmail.exe"
```
- Activer l'extension Apache 'ssl_module'
- Activer les extensions PHP 'php_openssl' et 'php_sockets'
- Redémarrer les services de WAMP

# Pour configurer un serveur SMTP sur un serveur

Recherche à faire  
