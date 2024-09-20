@extends('hyde::layouts.app')
@php($title = "The Deep Dive Podcast: HydePHP")
@php($navigation = ['hidden' => true])
@section('content')

    <section class="dark:text-gray-100">
        <div class="py-12 px-8 bg-offset md:px-0">
            <main class="mx-auto max-w-7xl">
                <h1 class="text-center text-3xl xl:text-4xl font-bold py-4 mb-8 text-gray-700 dark:text-gray-200">The Deep Dive Podcast: HydePHP</h1>

                <div class="bg-white dark:bg-slate-700 shadow-md rounded-lg p-6 mb-8">
                    <h2 class="text-2xl font-semibold mb-4">Listen to Our AI-Generated Podcast</h2>
                    <p class="mb-4">Explore the world of HydePHP in this unique, AI-generated podcast episode. Experience a blend of technology and creativity as we dive deep into the features and benefits of this innovative static site generator, as narrated by a dynamic duo in this podcast generated by <a href="https://notebooklm.google/" class="text-gray-700 dark:text-gray-300 hover:text-indigo-500 dark:hover:text-indigo-400" rel="noopener nofollow">NotebookML</a>, a cutting-edge project by Google.</p>

                    <div id="player" class="mb-4">
                        <div style="height: 7.5rem;" class="bg-white dark:bg-zinc-800 p-4 ring-1 ring-zinc-900/5 rounded-lg shadow-lg w-full">
                            <div class="flex h-full items-center space-x-4 animate-pulse">
                                <div class="rounded-full bg-zinc-200 dark:bg-zinc-700 h-16 w-16 aspect-square"></div>
                                <div class="flex-1 py-1">
                                    <div class="h-bg-zinc-200 dark:bg-zinc-700 rounded"></div>
                                    <div class="space-y-3">
                                        <div class="grid grid-cols-3 gap-4">
                                            <div class="h-4 bg-zinc-200 dark:bg-zinc-700 rounded col-span-2"></div>
                                            <div class="h-4 bg-zinc-200 dark:bg-zinc-700 rounded col-span-1"></div>
                                        </div>
                                        <div class="h-4 bg-zinc-200 dark:bg-zinc-700 rounded"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="transcript-container" class="mt-4 p-4 bg-gray-50 dark:bg-slate-800 rounded h-[16rem] relative overflow-hidden">
                        <h3 class="font-semibold mb-4">Transcript</h3>
                        <div id="transcript-wrapper" class="absolute inset-x-4 top-12 bottom-4 overflow-hidden">
                            <div id="transcript" class="text-sm absolute w-full transition-transform duration-300 ease-out">
                                <div id="transcript-ssr">
                                    <?php
                                    $raw = file_get_contents(Hyde::mediaPath('podcast/introduction.srt'));

                                    // Split the SRT file into individual blocks based on double newlines
                                    $blocks = preg_split('/\n\n|\r\n\r\n/', $raw);

                                    $formattedOutput = [];

                                    // Loop through each block and extract the spoken text
                                    foreach ($blocks as $block) {
                                        // Split each block into lines
                                        $lines = explode("\n", $block);

                                        // Remove the first two lines (index and timestamp) to get just the spoken text
                                        $lines = array_slice($lines, 2);

                                        // Merge lines of spoken text
                                        $text = implode(' ', $lines);

                                        // Wrap the spoken text in the specified HTML structure
                                        $formattedOutput[] = '<div class="seeker-line py-1 px-2 rounded transition-colors duration-300 text-gray-600 dark:text-gray-400 cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600"><span class="text-xs opacity-75 mr-1">00:00</span>' . htmlspecialchars($text) . '</div>';
                                    }

                                    // Join the formatted lines with newlines between each
                                    $formattedOutput = implode("\n", $formattedOutput);

                                    // Output the formatted HTML
                                    echo $formattedOutput;
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p class="text-sm text-gray-600 dark:text-gray-300 italic mt-4"><strong>Note:</strong> This podcast episode is entirely generated by AI, showcasing the potential of artificial intelligence in content creation.</p>
                    <p class="text-sm text-gray-600 dark:text-gray-300 italic mt-4"><strong>Human Editor's Note 1:</strong> HydePHP comes preconfigured with everything you need, but it never stands in your way when you need customization or your own logic.</p>
                    <p class="text-sm text-gray-600 dark:text-gray-300 italic mt-1"><strong>Human Editor's Note 2:</strong> There's no need to sign on a dotted line, HydePHP is, and will always be, free and open-source software.</p>
                </div>
            </main>

            <article class="mx-auto max-w-7xl bg-white dark:bg-slate-700 rounded-lg p-6">
                <h2 class="text-xl font-semibold mb-4">About This AI-Generated Podcast</h2>
                <p class="mb-2">This podcast episode was created using advanced AI technology from <a href="https://notebooklm.google/" class="text-gray-700 dark:text-gray-300 hover:text-indigo-500 dark:hover:text-indigo-400" rel="noopener nofollow">NotebookML</a>. Here's what makes it special:</p>

                <ul class="list-disc list-inside mb-4 ml-2">
                    <li>Content is 100% AI-generated, based on information about HydePHP</li>
                    <li>Demonstrates the capabilities of AI in producing engaging, informative content</li>
                    <li>Offers a unique perspective on HydePHP's features and benefits</li>
                </ul>

                <p class="mb-2">While this content is AI-generated, it reflects our commitment to exploring innovative ways to share information about HydePHP.</p>
                <p>We hope you enjoy this blend of technology and creativity!</p>
            </article>
        </div>
    </section>
@endsection

@push('styles')
    <script src="https://cdn.tailwindcss.com?plugins=typography"></script>
    <script>tailwind.config = { /* tailwind.config.js */ darkMode: 'class', content: [ './_pages/*.blade.php', './resources/views/**/*.blade.php', './vendor/hyde/framework/resources/views/**/*.blade.php', ], theme: { extend: { typography: { DEFAULT: { css: { lineHeight: '1.5em', maxWidth: '96ch', h2: { marginBottom: '0.75em', marginTop: '1.5em', }, a: { color: '#5956eb', '&:hover': { color: '#4f46e5', }, textDecoration: 'none' }, blockquote: { backgroundColor: '#80808020', borderLeftColor: '#d1d5db', color: 'unset', fontWeight: 500, fontStyle: 'unset', lineHeight: '1.25em', paddingLeft: '0.75em', paddingTop: '.25em', paddingBottom: '.25em', marginTop: '1em', marginBottom: '1em', p: { paddingRight: '.25em', marginTop: '.25em', marginBottom: '.25em', }, 'p::before': { content: 'unset', }, 'p::after': { content: 'unset', }, }, code: { font: 'unset', backgroundColor: '#80808033', paddingLeft: '4px', paddingRight: '4px', marginLeft: '-2px', marginRight: '1px', borderRadius: '4px' }, 'code::before': { content: 'unset', }, 'code::after': { content: 'unset', }, pre: { code: { fontFamily: "'Fira Code Regular', Consolas, Monospace, 'Courier New'", } } }, }, invert: { css: { a: { color: '#818cf8', '&:hover': { color: '#6366f1', }, }, }, }, }, colors: { indigo: { 500: '#5956eb', } }, }, }, safelist: [ 'prose', 'dark:prose-invert', 'text-left', 'text-center', 'text-right', 'ml-auto', 'mx-auto', 'mr-auto', 'my-0', 'my-4', 'my-8', 'py-0', 'py-4', 'py-8', 'mx-0', 'mx-4', 'mx-8', 'px-0', 'px-4', 'px-8', ],  }</script>
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/shikwasa@2.2.0/dist/shikwasa.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/shikwasa@2.2.0/dist/style.css">

    <style>
        .shk[data-theme=light], .shk {
            --color-primary: #4A5568!important;;
            --color-theme: #fff;
            --color-secondary: #767676;
            --color-text: #333;
            --color-shadow: #b9b6b680;
            --color-handle-shadow-mobile: #b9b6b6;
        }
        .shk[data-theme=dark], .dark .shk {
            --color-primary: #6366f1!important;
            --color-theme: #172133;
            --color-secondary: #b9b6b6;
            --color-text: #f8f9fa;
            --color-handle-shadow-mobile: #141414;
            --color-shadow: #14141480;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let player;
            let manualScrolling = false;
            let scrollTimeout;
            let translateY = 0;

            function initializePlayer() {
                player = new Shikwasa.Player({
                    container: () => document.getElementById('player'),
                    audio: {
                        title: 'The Deep Dive: HydePHP',
                        artist: 'AI-Generated Podcast',
                        cover: '{{ asset('logo.png') }}',
                        src: "https://git.desilva.se/temp/a101bb58-f54a-4b06-a2fd-4db7d4bafdee/podcast/introduction.wav",
                    },
                    chapters: [
                        { title: 'Introduction', startTime: 0, endTime: 60 },
                        { title: 'Features of HydePHP', startTime: 60, endTime: 180 },
                        { title: 'Benefits and Use Cases', startTime: 180, endTime: 300 },
                        { title: 'Conclusion', startTime: 300, endTime: 360 },
                    ],
                    themeColor: '#6366f1',
                    theme: 'light',
                });
            }

            // Load and display transcript
            fetch("https://git.desilva.se/temp/a101bb58-f54a-4b06-a2fd-4db7d4bafdee/podcast/introduction.srt")
                .then(response => response.text())
                .then(srt => {
                    const lines = parseSRT(srt);
                    const transcriptDiv = document.getElementById('transcript');

                    // Remove the SSR content (later we could just use this originally)
                    document.getElementById('transcript-ssr').remove();

                    lines.forEach((line, index) => {
                        const p = document.createElement('p');
                        const timestamp = secondsToTime(line.start);
                        p.innerHTML = `<span class="text-xs opacity-75 mr-1">${timestamp}</span> ${line.text}`;
                        p.id = `line-${index}`;
                        p.className = 'seeker-line py-1 px-2 rounded transition-colors duration-300 text-gray-600 dark:text-gray-400 cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600';
                        transcriptDiv.appendChild(p);
                    });

                    initializePlayer();

                    player.on('timeupdate', () => {
                        if (!manualScrolling) {
                            const currentTime = player.currentTime;
                            const currentLine = lines.findIndex(line => currentTime >= line.start && currentTime <= line.end);

                            if (currentLine !== -1) {
                                highlightLine(currentLine);
                            }
                        }
                    });

                    player.on('loadedmetadata', () => {
                        document.querySelectorAll('.seeker-line').forEach((p, index) => {
                            const line = lines[index];
                            p.addEventListener('click', () => {
                                player.seek(line.start);
                                player.play();
                            });
                        });
                    });
                });

            // Handle manual scrolling
            const transcriptWrapper = document.getElementById('transcript-wrapper');
            transcriptWrapper.addEventListener('wheel', (event) => {
                manualScrolling = true;

                event.preventDefault();

                clearTimeout(scrollTimeout);
                scrollTimeout = setTimeout(() => {
                    manualScrolling = false;
                }, 3000); // Delay to prevent immediate re-highlighting

                let currentScrollPosition = translateY;
                let scrollDirection = event.deltaY > 0 ? 'down' : 'up';
                const lineHeight = document.getElementById('line-0').offsetHeight;
                let scrollPosition = scrollDirection === 'down' ? currentScrollPosition + lineHeight : currentScrollPosition - lineHeight;

                // Set the transform offset to the scroll position
                document.getElementById('transcript').style.transform = `translateY(-${scrollPosition}px)`;
                translateY = scrollPosition;
            });

            function parseSRT(srt) {
                const lines = srt.trim().split('\n\n');
                return lines.map(line => {
                    const [id, time, ...text] = line.split('\n');
                    const [start, end] = time.split(' --> ').map(timeToSeconds);
                    return { id, start, end, text: text.join(' ') };
                });
            }

            function timeToSeconds(time) {
                const [hours, minutes, seconds] = time.split(':').map(parseFloat);
                return hours * 3600 + minutes * 60 + seconds;
            }

            function secondsToTime(seconds) {
                const minutes = Math.floor(seconds / 60).toString().padStart(2, '0');
                const remainingSeconds = Math.floor(seconds % 60).toString().padStart(2, '0');
                return `${minutes}:${remainingSeconds}`;
            }

            function highlightLine(lineIndex) {
                const lines = document.querySelectorAll('#transcript p');
                lines.forEach((line, index) => {
                    if (index === lineIndex) {
                        line.classList.add('bg-gray-200', 'dark:bg-gray-600', 'text-gray-900', 'dark:text-white');
                    } else {
                        line.classList.remove('bg-gray-200', 'dark:bg-gray-600', 'text-gray-900', 'dark:text-white');
                    }
                });

                const activeLine = document.getElementById(`line-${lineIndex}`);
                if (activeLine && !manualScrolling) {
                    const lineHeight = activeLine.offsetHeight;
                    const wrapperHeight = transcriptWrapper.offsetHeight;
                    const scrollPosition = activeLine.offsetTop - (wrapperHeight / 2) + (lineHeight / 2);

                    document.getElementById('transcript').style.transform = `translateY(-${scrollPosition}px)`;
                    translateY = scrollPosition;
                }
            }
        });
    </script>
@endpush