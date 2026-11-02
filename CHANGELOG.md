# CHANGELOG

## [1.1] — 2 novembre 2026
- Font: da serif (Iowan/Palatino/Georgia) a stack di sistema sans **peso light 300**, resa simile ad Amazon Ember Light (su Windows = Segoe UI Light, su Mac = Helvetica Neue Light). Zero richieste esterne.
- Bold e titoli a peso pieno (600) per mantenere il contrasto di lettura; in stampa il testo torna a 400.

## [1.0] — 2 novembre 2026
- Versione iniziale del tema "Lucacicca Reader".
- Stile e-reader: colonna 38rem, grigio caldo su bianco spento, interlinea 1.7.
- Dark mode con toggle manuale nell'header (JS inline ~20 righe, localStorage, prima paint senza flash).
- Un solo asset CSS (cache-bust via LCDR_VERSION); emoji script e jQuery frontend rimossi.
- Template universale index.php (home, singolo, archivi, ricerca, 404) + header, footer con archivio per anni, commenti senza avatar.
- Compatibilità editor classico: iframe YouTube responsive 16:9 (fix come meteo-webcam v1.7), caption, gallerie, blockquote, tabelle, allineamenti.
- Print stylesheet: la stampa di un post è una pagina pulita.
