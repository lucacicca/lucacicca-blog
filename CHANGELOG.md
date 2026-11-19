# CHANGELOG

## [1.10] — 19 novembre 2026
- Archivi (anno, mese, categorie, tag) e ricerca mostrano 20 post per pagina invece di 5 (`pre_get_posts` sulla query principale, feed esclusi). Paginazioni quattro volte più corte: es. l'archivio 2009 passa da 139 a 35 pagine, così i post vecchi sono più vicini per lettori e crawler (audit Search Console del 19/11: ~2.000 URL "rilevati ma non indicizzati", soprattutto post 2005-2014 mai scansionati).
- La home resta a 5 (valore di Impostazioni → Lettura) perché mostra i post per intero: 20 post completi la renderebbero troppo pesante.
- Le vecchie URL di paginazione oltre la nuova ultima pagina (es. /2009/page/100/) ora rispondono 404: atteso, erano già noindex.
- `LCDR_VERSION` 1.10 (cache-bust ?ver=1.10).

## [1.9] — 2 novembre 2026
- Fix categorie e tag sotto il post: erano su una riga unica separata da "|" e i tag composti da più parole (es. "luca bizzarri") si spezzavano a metà andando a capo, sembrando voci separate. Ora categorie e tag sono su due righe distinte (span .tax-row display:block) e ogni termine è indivisibile (white-space: nowrap sui link): il testo va a capo solo tra un termine e l'altro. Stesso principio dei fix v1.6/v1.7 per il footer. Rimossa la classe .tax-sep ormai inutilizzata.
- `LCDR_VERSION` 1.9 (cache-bust ?ver=1.9).

## [1.8] — 2 novembre 2026
- Header del tema per la preview e un'eventuale pubblicazione: Description riscritta (tema e-reader per blog di lettura, zero JS superfluo, nessuna richiesta esterna) e riga `Tags:` aggiunta (blog, one-column, custom-menu, featured-images, translation-ready). Nessun cambio CSS né funzionale.
- `LCDR_VERSION` 1.8 (cache-bust allineato). Screenshot `screenshot.png` (1200×900) da caricare via FTP nella cartella del tema.

## [1.7] — 2 novembre 2026
- Fix categorie nel footer: le sottocategorie (es. "informazione playlist" figlia di "musica") rompevano il layout perché `wp_list_categories` gerarchico annida le figlie in una ul interna che il flusso orizzontale non gestisce. Ora l'elenco è **piatto** (`hierarchical => false`, ordinamento alfabetico): padri e figlie come voci fratelle, tutte indivisibili su una riga.

## [1.6] — 2 novembre 2026
- Fix elenco categorie/anni nel footer: ogni voce indivisibile (`white-space: nowrap`), a-capo solo tra le voci. Stesso fix per i widget.

## [1.5] — 2 novembre 2026
- Miniature in home/archivi a piena colonna responsive; footer archivi anni + categorie in flusso orizzontale.
- Archivi data: fix lato Yoast SEO ("Disabilita gli archivi basati sulla data" OFF) — i 301 alla home erano di Yoast.

## [1.4] — 2 novembre 2026
- Miniature in home/archivi; categorie e tag sotto il post; post correlati; categorie nel footer.

## [1.3] — 2 novembre 2026
- Featured image nel post singolo full column (`large`, `fetchpriority="high"`).

## [1.2] — 2 novembre 2026
- Widget area "Footer (sotto il contenuto)"; nessuna sidebar laterale.

## [1.1] — 2 novembre 2026
- Font: stack di sistema sans peso light 300, simile ad Amazon Ember Light.

## [1.0] — 2 novembre 2026
- Versione iniziale: stile e-reader, dark mode toggle, template universale, compatibilità editor classico, print stylesheet.
