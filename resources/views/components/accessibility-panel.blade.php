{{-- Accessibility Panel Component --}}
<div 
    x-data="{ 
        open: false,
        fontSize: localStorage.getItem('dm-fontSize') || 'normal',
        contrast: localStorage.getItem('dm-contrast') || 'normal',
        reducedMotion: localStorage.getItem('dm-reducedMotion') === 'true',
        
        increaseFontSize() {
            if (this.fontSize === 'normal') this.fontSize = 'large';
            else if (this.fontSize === 'large') this.fontSize = 'x-large';
            this.updateBodyClass();
            localStorage.setItem('dm-fontSize', this.fontSize);
            this.announceChange('Font size increased');
        },
        
        decreaseFontSize() {
            if (this.fontSize === 'x-large') this.fontSize = 'large';
            else if (this.fontSize === 'large') this.fontSize = 'normal';
            this.updateBodyClass();
            localStorage.setItem('dm-fontSize', this.fontSize);
            this.announceChange('Font size decreased');
        },
        
        toggleContrast() {
            this.contrast = this.contrast === 'normal' ? 'high' : 'normal';
            this.updateBodyClass();
            localStorage.setItem('dm-contrast', this.contrast);
            this.announceChange('Contrast mode ' + (this.contrast === 'high' ? 'enabled' : 'disabled'));
        },
        
        toggleMotion() {
            this.reducedMotion = !this.reducedMotion;
            this.updateBodyClass();
            localStorage.setItem('dm-reducedMotion', this.reducedMotion);
            this.announceChange('Reduced motion ' + (this.reducedMotion ? 'enabled' : 'disabled'));
        },
        
        updateBodyClass() {
            // Remove all previous classes
            document.body.classList.remove(
                'font-normal', 'font-large', 'font-x-large',
                'contrast-normal', 'contrast-high',
                'reduced-motion'
            );
            
            // Add current classes
            document.body.classList.add('font-' + this.fontSize);
            document.body.classList.add('contrast-' + this.contrast);
            if (this.reducedMotion) document.body.classList.add('reduced-motion');
        },
        
        announceChange(message) {
            const announcer = document.getElementById('a11y-announcer');
            if (announcer) {
                announcer.textContent = message;
            }
        },
        
        init() {
            this.updateBodyClass();
        }
    }"
    @keydown.escape="open = false"
    class="accessibility-panel"
>
    {{-- Accessibility Button --}}
    <button 
        @click="open = !open" 
        class="fixed z-50 flex items-center justify-center p-2 bg-indigo-600 text-white rounded-full shadow-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 focus:bg-indigo-700 transition-all"
        :class="{ 'top-4 right-4': !open, 'top-4 right-4': open }"
        aria-label="Accessibility options"
        aria-expanded="false"
        :aria-expanded="open.toString()"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
            <circle cx="12" cy="7" r="4" />
        </svg>
    </button>
    
    {{-- Accessibility Panel --}}
    <div 
        x-show="open"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-90"
        x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-90"
        class="fixed top-16 right-4 w-80 p-4 bg-white dark:bg-gray-800 rounded-lg shadow-lg z-50 border border-gray-200 dark:border-gray-700"
        role="dialog"
        aria-labelledby="accessibility-title"
    >
        <div class="flex justify-between items-center mb-4">
            <h2 id="accessibility-title" class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                Accessibility Options
            </h2>
            <button 
                @click="open = false"
                class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                aria-label="Close accessibility panel"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        
        <div class="space-y-4">
            {{-- Font Size Controls --}}
            <div class="border-b border-gray-200 dark:border-gray-700 pb-4">
                <h3 class="text-md font-medium text-gray-700 dark:text-gray-300 mb-2">Text Size</h3>
                <div class="flex space-x-2">
                    <button 
                        @click="decreaseFontSize"
                        :disabled="fontSize === 'normal'"
                        class="flex-1 py-2 px-3 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded disabled:opacity-50 transition-colors dark:bg-gray-700 dark:hover:bg-gray-600"
                        :class="{ 'opacity-50 cursor-not-allowed': fontSize === 'normal' }"
                        aria-label="Decrease font size"
                    >
                        <span class="flex items-center justify-center">
                            A<span class="text-sm">-</span>
                        </span>
                    </button>
                    <button 
                        @click="increaseFontSize"
                        :disabled="fontSize === 'x-large'"
                        class="flex-1 py-2 px-3 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded disabled:opacity-50 transition-colors dark:bg-gray-700 dark:hover:bg-gray-600"
                        :class="{ 'opacity-50 cursor-not-allowed': fontSize === 'x-large' }"
                        aria-label="Increase font size"
                    >
                        <span class="flex items-center justify-center">
                            A<span class="text-sm">+</span>
                        </span>
                    </button>
                </div>
            </div>
            
            {{-- Contrast Controls --}}
            <div class="border-b border-gray-200 dark:border-gray-700 pb-4">
                <h3 class="text-md font-medium text-gray-700 dark:text-gray-300 mb-2">Display</h3>
                <button 
                    @click="toggleContrast"
                    class="w-full py-2 px-3 flex justify-between items-center bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded transition-colors dark:bg-gray-700 dark:hover:bg-gray-600"
                    aria-pressed="false"
                    :aria-pressed="contrast === 'high' ? 'true' : 'false'"
                >
                    <span class="font-medium">High Contrast</span>
                    <span class="inline-block w-12 h-6 bg-gray-300 rounded-full relative transition duration-300 ease-in-out dark:bg-gray-600" aria-hidden="true">
                        <span 
                            class="absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition-transform duration-300 ease-in-out transform"
                            :class="{ 'translate-x-6': contrast === 'high' }"
                        ></span>
                    </span>
                </button>
                <button 
                    @click="toggleMotion"
                    class="w-full mt-2 py-2 px-3 flex justify-between items-center bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded transition-colors dark:bg-gray-700 dark:hover:bg-gray-600"
                    aria-pressed="false"
                    :aria-pressed="reducedMotion ? 'true' : 'false'"
                >
                    <span class="font-medium">Reduce Motion</span>
                    <span class="inline-block w-12 h-6 bg-gray-300 rounded-full relative transition duration-300 ease-in-out dark:bg-gray-600" aria-hidden="true">
                        <span 
                            class="absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition-transform duration-300 ease-in-out transform"
                            :class="{ 'translate-x-6': reducedMotion }"
                        ></span>
                    </span>
                </button>
            </div>
            
            {{-- Reset Button --}}
            <button 
                @click="fontSize = 'normal'; contrast = 'normal'; reducedMotion = false; updateBodyClass(); localStorage.removeItem('dm-fontSize'); localStorage.removeItem('dm-contrast'); localStorage.removeItem('dm-reducedMotion'); announceChange('Accessibility settings reset to default');"
                class="w-full py-2 px-4 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors"
                aria-label="Reset all accessibility settings to default"
            >
                Reset to Default
            </button>
        </div>
    </div>
    
    {{-- Screen reader announcer --}}
    <div id="a11y-announcer" class="sr-only" aria-live="polite"></div>
</div>
