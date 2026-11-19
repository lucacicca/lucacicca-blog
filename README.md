# lucacicca-blog

## In English

Source of the custom WordPress theme for my personal blog [lucacicca.it](https://www.lucacicca.it), online since 2004 (about 3,400 posts). Development is AI-assisted with Claude Code; architecture, priorities and decisions are mine.

**Web performance:** minimal reading-first theme, one column, manual dark mode, no external assets, a single CSS file with versioned cache busting, no jQuery.

**Tracking:** Google Tag Manager (inserted once, by Site Kit) with the GTM4WP dataLayer. The GA4 tag sends `user_id` and page parameters (post type, category, tags) from the dataLayer, and a blocking trigger keeps the site owner's logged-in sessions out of the data. The tag setup is documented and checked against the published container in `docs/notes.md`.

**SEO:** Search Console audit and clean-up on a 20-year-old archive: redundant sitemaps removed, noindex on thin tag and link-roundup pages, meta descriptions on the pages with most impressions, legacy Flash video embeds fixed on the posts that still get traffic.

The changelog and the notes in `docs/` are in Italian.

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
