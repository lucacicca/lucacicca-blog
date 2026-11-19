# Note di sessione — lucacicca.it

Diario di lavoro per Claude e Luca. Le voci più recenti stanno in alto; se due voci si contraddicono, vale la più recente.

## 2026-11-19 — Audit Search Console, interventi SEO e tema 1.10

**Stato**
- Audit GSC (dati al 16/11): 399 pagine indicizzate, ~5.880 no; degli URL in sitemap indicizzati 276 su 4.244. Nessuna azione manuale né problema di sicurezza. ~2.000 "rilevate ma non indicizzate" (soprattutto post 2005-2014 mai scansionati), ~2.900 "scansionate ma non indicizzate" (vecchie pagine allegato, ora in redirect al file, e tag poveri).
- Fatto con l'OK di Luca: in GSC rimosse 9 sitemap ridondanti, resta solo `sitemap_index.xml`; avviata la convalida dei 5xx; meta description Yoast scritte su 11 post/pagine con più impressioni; noindex Yoast sui 158 post "links for AAAA-MM-GG" e sui 266 tag con un solo articolo (esclusi primadipartire, x-factor, elisabetta-ballarin, orche, laquila). Sitemap: post 3.226, tag 566 (erano 832). Flush W3TC.
- Tema 1.10: archivi e ricerca a 20 post per pagina, home invariata a 5 (vedi CHANGELOG). Da caricare via FTP: `functions.php` e `style.css`.

- Collaudo 1.10 da visitatore (dopo il caricamento FTP e il flush W3TC fatti da Luca): `?ver=1.10` ovunque; home 5 post (ultima pagina 677, invariata); /2009/ 20 post, 35 pagine, /2009/page/36/ → 404; mese, categoria e ricerca a 20; tag e post vecchi/recenti ok; feed invariati (10 item); robots invariati (anno noindex, categoria index); toggle dark presente, niente jQuery.

**Decisioni già prese**
- Interventi diretti di Claude su WordPress (wp-admin, Yoast, W3TC, flush cache compresi): ridurli al minimo e chiedere sempre prima a Luca. Il collaudo da visitatore resta libero.
- Post "links for" e tag con un solo articolo: noindex.
- Home a 5 post per pagina (mostra i post interi); archivi e ricerca a 20.

**Attenzione**
- Le impostazioni Yoast dei termini stanno tutte in un'unica opzione (`wpseo_taxonomy_meta`): salvataggi in parallelo si sovrascrivono a vicenda (38 tag erano tornati "default"). Modifiche massive ai termini: una alla volta.

**Aperto**
- Vecchi embed YouTube in Flash (`<object>`, es. post del gennaio 2009 "Posso parlare con il Signore?") lasciano un riquadro vuoto di ~350px: non dipende dal tema, da valutare con Luca.
- Tra qualche settimana in GSC: esito della convalida 5xx, andamento dei "non indicizzati", indicizzazione dei post vecchi.

## 2026-11-19 — Verifica dopo l'aggiornamento a WordPress 7.1.5

**Stato** (collaudo da visitatore, `credentials:'omit'`)
- Core aggiornato a WordPress 7.1.5 (rilascio di sola sicurezza del 18/11/2026, nessuna funzione nuova). Il tema non usa blocchi né API toccate dal rilascio.
- Tema v1.9 senza conflitti: home, post recente (/2026/08/ranucci-e-la-vanita/), post del 2004 (/2004/12/inizio/), archivi /2004/ e /2026/, /category/blog/, ricerca e 404 rispondono con lo status giusto, `style.css?ver=1.9`, nessun errore PHP nell'HTML, niente jQuery né emoji, toggle dark mode funzionante, nessun errore in console, nessuno scroll orizzontale a 375px.
- GTM-KBLM84 presente una volta, dataLayer di GTM4WP presente.

**Decisioni già prese**
- "Sign in with Google" di Site Kit disattivato da Luca (caricava `accounts.google.com/gsi/client` + `sign-in-with-google-*.js` su ogni pagina). Dopo il flush della page cache W3TC verificato da visitatore: script assente su home, post, archivi e categoria; nel frontend resta solo `akismet-frontend.js` sui post con commenti, più GTM.
- Nota: i risultati di ricerca includono `platform.twitter.com/widgets.js` dagli embed nei testi dei vecchi post (contenuto, non tema).

## 2026-11-19 — Correzione GTM: l'attivatore "utente lucacicca" è un'eccezione

**Decisioni già prese**
- L'attivatore "utente lucacicca" (DOM Ready, `DL - visitorId` = 1) è l'**eccezione** (trigger di blocco) del tag Google Analytics: le sessioni di Luca da loggato non vengono registrate in GA. Verificato nel workspace GTM-KBLM84 (Tag → Google Analytics: attivazione DOM Ready, eccezione "utente lucacicca"; 0 modifiche non pubblicate) e nel gtm.js pubblicato (versione 77, regola "block" presente). La voce precedente lo dava per scollegato: era sbagliata.
- Le variabili `DL - pagePostAuthor` e `DL - transactionProducts.0.metric1` restano nel container: a Luca sono servite per dei test. Non sono da pulire.
- È un motivo in più per tenere GTM4WP: senza il suo dataLayer `visitorId` sarebbe vuoto e l'esclusione non funzionerebbe.
- Tag nel container: Conversion Linker (All Pages), CookieYes CMP (Consent Initialization), Google Analytics (DOM Ready, eccezione "utente lucacicca").

## 2026-11-19 — Allineamento documentazione

**Stato**
- README e knowledge del progetto allineati alla verifica plugin qui sotto (elenco plugin attivi; font del tema sans light 300, non serif).
- Tema invariato: v1.9.

**Aperto**
- Le istruzioni del progetto Claude citano ancora Redirection (descrizione e "Plugin tenuti"): da correggere a mano da Luca nelle impostazioni del progetto.

## 2026-11-19 — Verifica plugin installati

**Stato** (controllato in wp-admin/plugins.php e come visitatore)
- Plugin attivi: Akismet, Classic Editor, GTM4WP, Really Simple Security, Site Kit by Google, W3 Total Cache, Yoast SEO. Questo elenco sostituisce i precedenti.
- Jetpack e WP Smush sono già stati rimossi: il punto aperto è chiuso.
- Redirection non è installato e a Luca non serve.
- GTM-KBLM84 lo inserisce Site Kit (snippet e noscript), una sola volta. GTM4WP ha "Container placement" su off: non carica GTM, aggiunge solo il dataLayer. Nessun GA caricato a parte.

**Decisioni già prese**
- GTM4WP si tiene: il container GTM-KBLM84 usa il suo dataLayer. Il tag Google Analytics (G-9LZ2B131VQ) manda `user_id` = `{{DL - visitorId}}` e, tramite la variabile "Event Settings", i parametri `pageTags` (pageAttributes), `pageCategory`, `pagePostType`, `pagePostType2`. Senza GTM4WP arriverebbero vuoti.
- ~~Nel container l'attivatore "utente lucacicca" (visitorId = 1) non è collegato a nessun tag~~ — SBAGLIATO, vedi "Correzione GTM". Le variabili `DL - pagePostAuthor` e `DL - transactionProducts.0.metric1` non sono usate.

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
