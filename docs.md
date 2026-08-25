# Guida alla Struttura del Tema WordPress con Roots Sage 10

Questo documento fornisce una panoramica chiara e concisa dell'architettura di un tema WordPress basato su **Roots Sage 10**, aiutandoti a orientarti tra le directory e i file principali del progetto `terna-theme-wp`.

---

## 1. Cos'è Roots Sage?

**Sage** è uno starter theme per WordPress sviluppato dal team di **Roots**. Il suo obiettivo è modernizzare lo sviluppo di temi WordPress introducendo strumenti e workflow tipici dello sviluppo web contemporaneo, tra cui:

*   **Laravel Blade:** Un motore di templating pulito e potente che sostituisce il PHP puro per la scrittura delle viste (l'HTML del tema).
*   **Acorn:** Un framework che porta le componenti di Laravel (come Service Provider, View Composers, ecc.) dentro WordPress.
*   **Vite (o Webpack/Bud):** Per la compilazione e l'ottimizzazione degli asset (CSS, JavaScript, immagini).
*   **Gestione dipendenze:** Utilizza `Composer` per il PHP e `npm`/`yarn` per il frontend.

L'approccio di Sage separa nettamente la **logica** (PHP) dalla **presentazione** (HTML/Blade).

---

## 2. Architettura delle Cartelle Principali

Di seguito l'alberatura delle directory più importanti del tuo tema e il loro scopo.

### `app/` (La Logica del Tema)
Questa cartella contiene tutto il codice PHP che gestisce il funzionamento del tema (registrazione menu, custom post types, variabili da passare alle viste).

*   **`setup.php`**: È il cuore della configurazione. Qui vengono registrati i menu di navigazione, i supporti del tema (es. immagini in evidenza, tag title), le dimensioni delle immagini e le sidebar.
*   **`filters.php`**: Contiene le funzioni che modificano il comportamento predefinito di WordPress o di altri plugin tramite gli hook (`add_filter`, `add_action`).
*   **`Providers/`**: Contiene i Service Provider di Laravel, utilizzati per fare il bootstrap di servizi o funzionalità complesse.
*   **`View/Composers/`**: Questa è una funzionalità chiave di Sage 10. I "View Composers" servono a preparare i dati prima che vengano inviati ai file Blade. Ad esempio, `App.php` può definire la variabile `$siteName` (il nome del sito) che sarà poi disponibile automaticamente in tutti i file Blade, evitando di scrivere codice PHP ingombrante direttamente nell'HTML.

### `resources/` (Il Frontend e i Template)
Questa cartella contiene tutto ciò che riguarda l'aspetto visivo: CSS, JavaScript, immagini e, soprattutto, i file Blade (le viste).

#### `resources/views/` (I File Blade)
I file con estensione `.blade.php` sostituiscono i classici template PHP di WordPress.

*   **`layouts/` (Es. `app.blade.php`)**: Contiene lo scheletro principale della pagina. Definisce la struttura base (es. l'inclusione di header e footer) e usa una direttiva `@yield('content')` nel punto in cui deve essere iniettato il contenuto specifico di ogni pagina.
*   **`sections/` (Es. `header.blade.php`, `footer.blade.php`)**: Contiene le macro-sezioni strutturali del sito. Questi file vengono inclusi all'interno del layout principale.
*   **`partials/` (Es. `navigation.blade.php`, `content.blade.php`)**: Contiene piccoli frammenti di codice riutilizzabili (componenti). Ad esempio, la struttura del loop di un singolo articolo o, come abbiamo visto, il menu di navigazione che viene poi incluso nell'header.
*   **File di Template (Es. `index.blade.php`, `page.blade.php`, `single.blade.php`)**: Questi file corrispondono alla gerarchia dei template di WordPress. `page.blade.php` controlla l'aspetto delle Pagine, `single.blade.php` dei Singoli Articoli, ecc. Estendono il layout base (usando `@extends('layouts.app')`) e riempiono la sezione `@section('content')`.

#### Altre cartelle in `resources/`
*   **`css/`**: I fogli di stile del tema (es. `app.css`).
*   **`js/`**: I file JavaScript (es. `app.js`).
*   **`images/`**: Immagini statiche e icone (es. logo in SVG).

### File nella Root del Progetto
*   **`composer.json` / `composer.lock`**: Gestiscono le dipendenze PHP del tema (come il core di Sage o Acorn).
*   **`package.json` / `package-lock.json`**: Gestiscono le dipendenze frontend (npm) e gli script per la build (es. Vite).
*   **`vite.config.js`**: Il file di configurazione del bundler Vite, che indica come compilare e ottimizzare CSS e JS.
*   **`functions.php`**: Nei temi standard è il file principale per la logica. In Sage, è tenuto molto snello e si limita a caricare l'autoloader di Composer e a fare il bootstrap del framework Acorn, delegando la logica vera e propria alla cartella `app/`.
*   **`index.php`**: Obbligatorio per WordPress, ma in Sage è essenzialmente vuoto e serve solo come punto di ingresso per il routing interno del framework.
*   **`style.css`**: Contiene solo l'intestazione commentata richiesta da WordPress per riconoscere il tema (Nome Tema, Autore, Versione). Gli stili veri e propri sono in `resources/css/`.
*   **`theme.json`**: Utilizzato per configurare le impostazioni globali e gli stili per l'editor a blocchi (Gutenberg) di WordPress.

---

## 3. Flusso di Lavoro Tipico

1.  **Aggiungere uno Stile o uno Script**: Modifichi i file in `resources/css/` o `resources/js/` ed esegui `npm run dev` (per lo sviluppo in tempo reale) o `npm run build` (per la produzione).
2.  **Modificare la Struttura HTML**: Modifichi i file `.blade.php` in `resources/views/`.
3.  **Passare Dati alla Vista**: Invece di scrivere query complesse dentro i file Blade, crei metodi all'interno dei file in `app/View/Composers/` che restituiscono le variabili pronte all'uso.
4.  **Aggiungere Funzionalità a WordPress**: Usi `app/setup.php` per configurazioni generali e `app/filters.php` per modificare comportamenti specifici tramite gli hook.
