{{-- Audio Aid Quick Access Button --}}
<div 
    x-data="{ 
        isPlaying: false,
        toggleAudio() {
            if (this.isPlaying) {
                window.ttsController.stop();
                this.isPlaying = false;
            } else {
                const pageContent = window.ttsController.extractPageContent();
                window.ttsController.speak(pageContent);
                this.isPlaying = true;
            }
        }
    }"
    class="fixed bottom-4 left-4 z-50"
>
    <button 
        @click="toggleAudio"
        class="flex items-center justify-center p-3 bg-blue-600 text-white rounded-full shadow-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all"
        :class="{ 'bg-red-600 hover:bg-red-700': isPlaying }"
        aria-label="Audio aid - read page content"
    >
        <svg x-show="!isPlaying" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15.414l-2.829-2.828a8 8 0 010-11.314l2.829-2.828a8 8 0 0111.314 0l2.828 2.828a8 8 0 010 11.314l-2.828 2.828a8 8 0 01-11.314 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18v-6m0 0l3 3m-3-3l-3 3" />
        </svg>
        <svg x-show="isPlaying" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
    </button>
    <span class="sr-only">Audio aid button - click to read page content aloud</span>
</div>
