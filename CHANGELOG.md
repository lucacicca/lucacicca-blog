# CHANGELOG

## [1.0] — 2 novembre 2026
- Versione iniziale del tema "Lucacicca Reader".
- Stile e-reader: serif (Iowan/Palatino/Georgia), grigio caldo su bianco spento, colonna 38rem, interlinea 1.7.
- Dark mode con toggle manuale nell'header (JS inline ~20 righe, localStorage, prima paint senza flash).
- Un solo asset CSS (cache-bust `?ver=1.0` via LCDR_VERSION); emoji script e jQuery frontend rimossi.
- Template universale index.php (home, singolo, archivi, ricerca, 404) + header, footer con archivio per anni, commenti senza avatar.
- Compatibilità editor classico: iframe YouTube responsive 16:9 (fix come meteo-webcam v1.7), caption, gallerie, blockquote, tabelle, allineamenti.
- Print stylesheet: la stampa di un post è una pagina pulita.
