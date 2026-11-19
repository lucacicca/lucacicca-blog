# lucacicca-blog

Sorgenti del tema WordPress del blog personale **[lucacicca.it](https://www.lucacicca.it)** (online dal 2004, hosting Tophost).

## Contenuto

- `theme/` — tema custom **"Lucacicca Reader"**: tema minimale per la lettura, stile e-reader (una colonna, sans light, alto contrasto, dark mode con toggle manuale). Zero asset esterni, un solo CSS con cache-busting `?ver=x.y`.
- `docs/notes.md` — note di sessione (stato, decisioni, cose aperte), voci più recenti in alto.
- `CHANGELOG.md` — cronologia delle versioni (regola del progetto: ogni modifica al tema = bump di versione nell'header + nota nel changelog + push su questo repo).

## Convenzioni

- Il sorgente vive QUI; il file caricato via FTP in `wp-content/themes/lucacicca-reader/` è il deploy.
- Costante `LCDR_VERSION` in `theme/functions.php`: allinearla sempre all'header di `theme/style.css`.
- Plugin attivi sul sito (verifica del 19/11/2026): Akismet, Classic Editor, GTM4WP (solo dataLayer), Really Simple Security, Site Kit by Google (inserisce GTM), W3 Total Cache (solo Page Cache, Minify disattivato), Yoast SEO. Dettagli e decisioni in `docs/notes.md`.

## Installazione

1. Copiare il contenuto di `theme/` in `wp-content/themes/lucacicca-reader/` via FTP.
2. Aspetto → Temi → attivare "Lucacicca Reader".
