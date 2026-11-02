# CHANGELOG

## [1.6] — 2 novembre 2026
- Fix elenco categorie/anni nel footer: le voci con nome lungo (es. "informazione playlist") si spezzavano su due righe; ora ogni voce è indivisibile (`white-space: nowrap`) e il flusso va a capo solo tra le voci. Stesso fix per le liste dei widget.

## [1.5] — 2 novembre 2026
- Miniature in home/archivi a piena colonna responsive (size `large`, lazy); footer archivi anni + categorie in flusso orizzontale.
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
