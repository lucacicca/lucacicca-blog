# CHANGELOG

## [1.3] — 2 novembre 2026
- Featured image nel post singolo: full column width sotto il titolo/meta (dimensione `large`, `fetchpriority="high"`). Nessuna featured in home/archivi per mantenere la lista di sola lettura.

## [1.2] — 2 novembre 2026
- Widget area "Footer (sotto il contenuto)": i widget vanno sotto il contenuto, a colonna piena; nessuna sidebar laterale.
- Stili per i widget nel footer.

## [1.1] — 2 novembre 2026
- Font: stack di sistema sans **peso light 300**, resa simile ad Amazon Ember Light (su Windows = Segoe UI Light, su Mac = Helvetica Neue Light). Zero richieste esterne.
- Bold e titoli a peso pieno (600); in stampa il testo torna a 400.

## [1.0] — 2 novembre 2026
- Versione iniziale del tema "Lucacicca Reader".
- Stile e-reader: colonna 38rem, grigio caldo su bianco spento, interlinea 1.7.
- Dark mode con toggle manuale nell'header (JS inline ~20 righe, localStorage, prima paint senza flash).
- Un solo asset CSS (cache-bust via LCDR_VERSION); emoji script e jQuery frontend rimossi.
- Template universale index.php + header, footer con archivio per anni, commenti senza avatar.
- Compatibilità editor classico: iframe YouTube responsive 16:9, caption, gallerie, blockquote, tabelle, allineamenti.
- Print stylesheet.
