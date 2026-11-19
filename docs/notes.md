# Note di sessione — lucacicca.it

Diario di lavoro per Claude e Luca. Le voci più recenti stanno in alto; se due voci si contraddicono, vale la più recente.

## 2026-11-19 — Verifica plugin installati

**Stato** (controllato in wp-admin/plugins.php e come visitatore)
- Plugin attivi: Akismet, Classic Editor, GTM4WP, Really Simple Security, Site Kit by Google, W3 Total Cache, Yoast SEO. Questo elenco sostituisce i precedenti.
- Jetpack e WP Smush sono già stati rimossi: il punto aperto è chiuso.
- Redirection non è installato e a Luca non serve.
- GTM-KBLM84 lo inserisce Site Kit (snippet e noscript), una sola volta. GTM4WP ha "Container placement" su off: non carica GTM, aggiunge solo il dataLayer. Nessun GA caricato a parte.

**Decisioni già prese**
- GTM4WP si tiene: il container GTM-KBLM84 usa il suo dataLayer. Il tag Google Analytics (G-9LZ2B131VQ) manda `user_id` = `{{DL - visitorId}}` e, tramite la variabile "Event Settings", i parametri `pageTags` (pageAttributes), `pageCategory`, `pagePostType`, `pagePostType2`. Senza GTM4WP arriverebbero vuoti.
- Nel container l'attivatore "utente lucacicca" (visitorId = 1) non è collegato a nessun tag; le variabili `DL - pagePostAuthor` e `DL - transactionProducts.0.metric1` non sono usate.

## 2026-11-19 — Tracking e Google Site Kit

**Decisioni già prese**
- Google Site Kit è tra i plugin tenuti (confermato da Luca). Elenco aggiornato: Akismet, Redirection, Yoast SEO, W3 Total Cache, Google Site Kit.
- Tracking: Site Kit installa GTM, GA è caricato tramite GTM. Il tema resta senza tracking; nel collaudo da visitatore i tag GTM/GA nell'HTML sono attesi.

## 2026-11-19 — Avvio del progetto Claude dedicato

**Stato**
- Tema "Lucacicca Reader" v1.9 (commit 705c260 del 3/11/2026), rifatto a novembre 2026 con Mistral. `Version:` in `theme/style.css` e `LCDR_VERSION` in `theme/functions.php` sono allineati a 1.9.
- Deploy via FTP in `wp-content/themes/lucacicca-reader/`; `screenshot.png` (1200×900) caricato a parte, non è nel repo.
- Plugin tenuti: Akismet, Redirection, Yoast SEO, W3 Total Cache (solo Page Cache, Minify OFF).
- Nel tema non c'è nessun tracking (né GA né GTM).

**Decisioni già prese**
- Yoast: "Disabilita gli archivi basati sulla data" OFF. I 301 degli archivi per data verso la home erano di Yoast.
- Categorie, tag e voci del footer non si spezzano mai: `white-space: nowrap` sui termini, a capo solo tra una voce e l'altra. Categorie del footer in elenco piatto (`hierarchical => false`).

**Aperto**
- Rimuovere Jetpack e WP Smush (verificare se è già stato fatto).
