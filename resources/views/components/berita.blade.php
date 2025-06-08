<!-- Monochrome News Section -->
<section class="bg-white mt-9 py-20 px-4">
    <div class="max-w-7xl mx-auto">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Latest News & Events</h2>
            <div class="w-24 h-0.5 bg-gray-900 mx-auto"></div>
        </div>

        <!-- News Carousel -->
        <div id="monochromeNewsContainer" class="relative">
            @foreach ($berita as $index => $item)
                @php
                    // Extract YouTube ID from any URL format
                    $videoId = null;
                    if ($item->video_url) {
                        preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $item->video_url, $matches);
                        $videoId = $matches[1] ?? null;
                    }
                @endphp

                <div class="monochrome-slide {{ $index !== 0 ? 'hidden' : '' }}">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-stretch">
                        <!-- Left: Video + Title -->
                        <div class="lg:col-span-7">
                            <div class="relative overflow-hidden rounded-lg shadow-md transform transition-all duration-500 hover:shadow-lg">
                                <!-- YouTube Video Container -->
                                <div class="relative pb-[56.25%] h-0 bg-gray-100 rounded-xl overflow-hidden">
                                    @if($videoId)
                                        <iframe class="absolute top-0 left-0 w-full h-full"
                                                src="https://www.youtube.com/embed/{{ $videoId }}?rel=0&modestbranding=1&autoplay=0&showinfo=0&controls=1"
                                                title="YouTube video player"
                                                frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>
                                    @elseif($item->video_url)
                                        <div class="absolute inset-0 flex items-center justify-center bg-gray-400">
                                            <span class="text-white">URL video tidak valid</span>
                                        </div>
                                    @else
                                        <div class="absolute inset-0 flex items-center justify-center bg-gray-200">
                                            <span class="text-gray-600">Tidak ada video</span>
                                        </div>
                                    @endif
                                </div>
                                
                                <!-- Hover Overlay -->
                                <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent opacity-0 hover:opacity-100 transition-opacity duration-300 flex items-end p-6 pointer-events-none">
                                    <h3 class="text-2xl font-bold text-white">{{ $item->title ?? 'Judul tidak tersedia' }}</h3>
                                </div>
                            </div>

                            <!-- News Content -->
                            <div class="mt-6 bg-gray-50 p-6 rounded-lg border border-gray-200">
                                <h3 class="text-xl font-semibold text-gray-900 mb-3">{{ $item->title }}</h3>
                                <p class="text-gray-700">{{ $item->description ?? 'Deskripsi belum tersedia.' }}</p>
                            </div>
                        </div>

                        <!-- Right: Highlights & Events -->
                        <div class="lg:col-span-5 space-y-8">
                            <!-- Image Gallery -->
                            <div class="grid grid-cols-2 gap-4">
                                @for ($i = 1; $i <= 2; $i++)
                                    <div class="relative group overflow-hidden rounded-lg shadow-md h-48">
                                        <img src="{{ $item->{'image'.$i} ? asset('storage/'.$item->{'image'.$i}) : asset('images/default.jpg') }}"
                                             alt="Gambar {{ $i }}"
                                             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110 grayscale hover:grayscale-0">
                                        <div class="absolute inset-0 bg-black/20 flex items-end p-4">
                                            <p class="text-white font-medium">{{ $item->{'text'.$i} ?? 'Teks tidak tersedia' }}</p>
                                        </div>
                                    </div>
                                @endfor
                            </div>

                            <!-- Highlights -->
                            <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                                <h3 class="text-xl font-semibold text-gray-900 mb-3 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-700" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z" clip-rule="evenodd" />
                                    </svg>
                                    News Highlights
                                </h3>
                                @if($item->highlights)
                                    <ul class="list-disc pl-5 text-sm text-gray-700 space-y-1">
                                        @foreach(json_decode($item->highlights) as $highlight)
                                            <li>{{ $highlight }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p class="text-sm text-gray-700">Belum ada highlight berita.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <!-- Slide Controls -->
            <div class="flex justify-center mt-12 space-x-4">
                <button id="monochromePrevBtn" class="p-2 rounded-full bg-gray-100 hover:bg-gray-200 transition-colors duration-300 text-gray-700 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>

                <div class="flex items-center space-x-2">
                    @foreach($berita as $i => $_)
                        <span class="w-3 h-3 rounded-full {{ $i === 0 ? 'bg-gray-900' : 'bg-gray-300' }}"></span>
                    @endforeach
                </div>

                <button id="monochromeNextBtn" class="p-2 rounded-full bg-gray-100 hover:bg-gray-200 transition-colors duration-300 text-gray-700 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</section>

<script>
    // Enhanced Carousel with Auto-Play
    document.addEventListener('DOMContentLoaded', function() {
        const slides = document.querySelectorAll('.monochrome-slide');
        const dots = document.querySelectorAll('#monochromeNewsContainer .flex.items-center span');
        let currentIndex = 0;
        let autoPlayInterval;
        let isAutoPlaying = true;

        function showSlide(index) {
            // Update current index
            currentIndex = index;
            
            // Update slides visibility
            slides.forEach((slide, i) => {
                slide.classList.toggle('hidden', i !== index);
            });
            
            // Update dots
            dots.forEach((dot, i) => {
                dot.classList.toggle('bg-gray-900', i === index);
                dot.classList.toggle('bg-gray-300', i !== index);
            });
        }

        function startAutoPlay() {
            if (isAutoPlaying) {
                autoPlayInterval = setInterval(() => {
                    const nextIndex = (currentIndex + 1) % slides.length;
                    showSlide(nextIndex);
                }, 5000); // Change slide every 5 seconds
            }
        }

        function stopAutoPlay() {
            clearInterval(autoPlayInterval);
        }

        function resetAutoPlay() {
            stopAutoPlay();
            startAutoPlay();
        }

        // Initialize
        showSlide(0);
        startAutoPlay();

        // Navigation controls
        document.getElementById('monochromePrevBtn').addEventListener('click', () => {
            const prevIndex = (currentIndex - 1 + slides.length) % slides.length;
            showSlide(prevIndex);
            resetAutoPlay();
        });

        document.getElementById('monochromeNextBtn').addEventListener('click', () => {
            const nextIndex = (currentIndex + 1) % slides.length;
            showSlide(nextIndex);
            resetAutoPlay();
        });

        // Dot navigation
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                showSlide(index);
                resetAutoPlay();
            });
        });

        // Pause on hover
        document.getElementById('monochromeNewsContainer').addEventListener('mouseenter', () => {
            isAutoPlaying = false;
            stopAutoPlay();
        });
        
        document.getElementById('monochromeNewsContainer').addEventListener('mouseleave', () => {
            isAutoPlaying = true;
            startAutoPlay();
        });
    });
</script>