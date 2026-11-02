# CHANGELOG

## [1.4] — 2 novembre 2026
- Miniature (size `thumbnail`, lazy) in home e archivi, sopra il titolo, cliccabili.
- Categorie e tag sotto il post singolo, tutti cliccabili (riga "Categorie: ... | Tag: ...").
- **Post correlati**: sezione sotto il post con 3 post della stessa categoria, miniatura + titolo, query PHP nel tema (nessun plugin), random ad ogni vista.
- Footer: blocco categorie (ordinato per numero di post) accanto all'archivio per anni.
- Nota bug report: i link dell'archivio annuale (/2024/ ecc.) risultavano puntare alla home — URL verificati come corretti per la struttura permalink /%year%/%monthnum%/%postname%/; da indagare regola catch-all del plugin Redirection o cache W3TC dopo il deploy.

## [1.3] — 2 novembre 2026
- Featured image nel post singolo: full column width sotto il titolo/meta (dimensione `large`, `fetchpriority="high"`).

## [1.2] — 2 novembre 2026
- Widget area "Footer (sotto il contenuto)": nessuna sidebar laterale; stili widget.

## [1.1] — 2 novembre 2026
- Font: stack di sistema sans **peso light 300**, resa simile ad Amazon Ember Light. Zero richieste esterne.
- Bold e titoli a peso pieno (600); in stampa il testo torna a 400.

## [1.0] — 2 novembre 2026
- Versione iniziale del tema "Lucacicca Reader".
- Stile e-reader: colonna 38rem, grigio caldo su bianco spento, interlinea 1.7.
- Dark mode con toggle manuale nell'header (JS inline, localStorage, prima paint senza flash).
- Un solo asset CSS (cache-bust via LCDR_VERSION); emoji script e jQuery frontend rimossi.
- Template universale index.php + header, footer con archivio per anni, commenti senza avatar.
- Compatibilità editor classico: iframe YouTube responsive 16:9, caption, gallerie, blockquote, tabelle, allineamenti.
- Print stylesheet.
