
# Trappola laser con Arduino e NodeMcu
## Funzionalità:
#### Fase di attivazione:
Una volta puntato il laser sulla fotoresistenza il led rosso si illuminerà facendo entrare Arduino in "**Armed Mode**", l'interruzione del fascio farà scattare la trappola illuminando il led verde.

Dopo l'attivazione la trappola registrerà nel database:

 - Quale sensore è scattato nel caso ce ne fossero più di uno.
 - Orario dell'attivazione
 - Data dell'attivazione.


Inoltre la webcam posizionata nelle vicinanze scatterà una foto di chi o cosa ha attivato la trappola.

#### Visualizzazione dei dati:

Nella pagina **Homepage.php** saranno presenti le raw entri del DB, una tabella che mostra tutte le attivazioni presenti nel DB.

Nella Pagina **Grafici.php** saranno presenti 3 grafici riassuntivi delle varie attivazioni in particolare:

 - Attivazioni totali divise per sensore
 - Attivazioni nelle ultime 24 ore divise per sensore
 - Attivazioni totali di tutti i sensori nell'ultimo anno divise per mese

 Per finire, nella pagina **Galleria.php** saranno presenti le foto scattate dal sensore, il nome della foto corrisponde al numero dell'attivazione (**Es:** la foto dell'attivazione numero 64 sarà "64.jpg")

#### Gestione del DB:

Sono presenti 2 pagine per la gestione del DB:


 - **Inizializzazione.php** : Operazione necessaria solo al primo avvio, inizializza il DB e lo rende pronto a ricevere dati.
- **PuliziaDB.php** : Svuota il DB da tutti i rilevamenti e cancella tutte le foto a esse associate. **NB:** Operazione irreversibile.

#### Gestione dei Sensori:

Nella pagina **Reset.php** é possibile far eseguire a entrambi i sensori un "Soft Reset", dopo questa operazione sarà necessario attendere qualche secondo per permettere ad entrambe le schede il riavvio. 
(**NB:**Il nome del sensore verrà riportato ad "**A**"  )

Nella pagina **Cambionomestazione.php** è possibile assegnare un'altra lettera alla stazione.
