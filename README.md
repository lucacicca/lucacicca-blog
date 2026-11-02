# lucacicca-blog

Sorgenti del tema WordPress del blog personale **[lucacicca.it](https://www.lucacicca.it)** (online dal 2004, hosting Tophost).

## Contenuto

- `theme/` — tema custom **"Lucacicca Reader"**: tema minimale per la lettura, stile e-reader (una colonna, serif, alto contrasto, dark mode con toggle manuale). Zero asset esterni, un solo CSS con cache-busting `?ver=x.y`.
- `CHANGELOG.md` — cronologia delle versioni (regola del progetto: ogni modifica al tema = bump di versione nell'header + nota nel changelog + push su questo repo).

## Convenzioni

- Il sorgente vive QUI; il file caricato via FTP in `wp-content/themes/lucacicca-reader/` è il deploy.
- Costante `LCDR_VERSION` in `theme/functions.php`: allinearla sempre all'header di `theme/style.css`.
- Plugin tenuti sul sito: Akismet, Redirection, Yoast, W3 Total Cache (solo Page Cache, Minify disattivato). Da eliminare: Jetpack, WP Smush.

## Installazione

1. Copiare il contenuto di `theme/` in `wp-content/themes/lucacicca-reader/` via FTP.
2. Aspetto → Temi → attivare "Lucacicca Reader".
