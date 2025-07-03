/**
 * DigiMarkt Accessibility Features
 * Provides accessibility features including screen reader support, text-to-speech, and UI adaptations
 */

// Text-to-Speech functionality
class TextToSpeechController {
    constructor() {
        this.synth = window.speechSynthesis;
        this.utterance = null;
        this.isPlaying = false;
        this.currentText = '';
        this.voices = [];
        this.selectedVoice = null;
        this.rate = 1.0;
        this.pitch = 1.0;
        this.volume = 1.0;
    }

    init() {
        // Load available voices
        this.loadVoices();
        
        // If voices aren't loaded immediately, wait for them
        if (speechSynthesis.onvoiceschanged !== undefined) {
            speechSynthesis.onvoiceschanged = this.loadVoices.bind(this);
        }
    }

    loadVoices() {
        this.voices = this.synth.getVoices();
        // Try to select an English voice as default
        this.selectedVoice = this.voices.find(voice => 
            voice.lang.includes('en') && voice.name.includes('Female')
        ) || this.voices[0];
    }

    speak(text) {
        // Cancel any ongoing speech
        this.stop();
        
        if (!text) return;
        
        this.currentText = text;
        this.utterance = new SpeechSynthesisUtterance(text);
        
        // Set speech properties
        this.utterance.voice = this.selectedVoice;
        this.utterance.rate = this.rate;
        this.utterance.pitch = this.pitch;
        this.utterance.volume = this.volume;
        
        // Set event handlers
        this.utterance.onstart = () => {
            this.isPlaying = true;
            this.updateControlState();
        };
        
        this.utterance.onend = () => {
            this.isPlaying = false;
            this.updateControlState();
        };
        
        this.utterance.onerror = (event) => {
            console.error('Speech synthesis error:', event);
            this.isPlaying = false;
            this.updateControlState();
        };
        
        // Start speaking
        this.synth.speak(this.utterance);
    }

    pause() {
        if (this.isPlaying) {
            this.synth.pause();
            this.isPlaying = false;
            this.updateControlState();
        }
    }

    resume() {
        if (!this.isPlaying && this.utterance) {
            this.synth.resume();
            this.isPlaying = true;
            this.updateControlState();
        }
    }

    stop() {
        this.synth.cancel();
        this.isPlaying = false;
        this.updateControlState();
    }

    setVoice(voiceURI) {
        const voice = this.voices.find(v => v.voiceURI === voiceURI);
        if (voice) {
            this.selectedVoice = voice;
            // If currently speaking, update the voice
            if (this.isPlaying) {
                const currentText = this.currentText;
                this.stop();
                this.speak(currentText);
            }
        }
    }

    setRate(rate) {
        this.rate = parseFloat(rate);
        // If currently speaking, update the rate
        if (this.isPlaying) {
            const currentText = this.currentText;
            this.stop();
            this.speak(currentText);
        }
    }

    setPitch(pitch) {
        this.pitch = parseFloat(pitch);
        // If currently speaking, update the pitch
        if (this.isPlaying) {
            const currentText = this.currentText;
            this.stop();
            this.speak(currentText);
        }
    }

    setVolume(volume) {
        this.volume = parseFloat(volume);
        // If currently speaking, update the volume
        if (this.isPlaying) {
            const currentText = this.currentText;
            this.stop();
            this.speak(currentText);
        }
    }

    updateControlState() {
        // Update UI controls based on current state
        const playButton = document.getElementById('tts-play');
        const pauseButton = document.getElementById('tts-pause');
        const stopButton = document.getElementById('tts-stop');
        
        if (playButton && pauseButton && stopButton) {
            if (this.isPlaying) {
                playButton.setAttribute('disabled', 'disabled');
                pauseButton.removeAttribute('disabled');
                stopButton.removeAttribute('disabled');
            } else {
                playButton.removeAttribute('disabled');
                pauseButton.setAttribute('disabled', 'disabled');
                stopButton.setAttribute('disabled', 'disabled');
            }
        }
    }

    // Extract readable text from the page
    extractPageContent() {
        // Get main content areas
        const mainContent = document.querySelector('main');
        if (!mainContent) return '';
        
        // Extract text from headings, paragraphs, and other relevant elements
        const headings = Array.from(mainContent.querySelectorAll('h1, h2, h3, h4, h5, h6'));
        const paragraphs = Array.from(mainContent.querySelectorAll('p'));
        const lists = Array.from(mainContent.querySelectorAll('li'));
        
        // Build content string
        let content = '';
        
        // Add page title
        const pageTitle = document.title;
        content += `DigiMarkt website. Page title: ${pageTitle}. `;
        
        // Add headings
        headings.forEach(heading => {
            content += `${heading.textContent}. `;
        });
        
        // Add paragraphs
        paragraphs.forEach(paragraph => {
            content += `${paragraph.textContent} `;
        });
        
        // Add list items
        if (lists.length > 0) {
            content += 'List items: ';
            lists.forEach(item => {
                content += `${item.textContent}. `;
            });
        }
        
        return content;
    }
}

// Initialize accessibility features when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    // Initialize text-to-speech
    window.ttsController = new TextToSpeechController();
    window.ttsController.init();
    
    // Setup event listeners for TTS controls
    const ttsPlayButton = document.getElementById('tts-play');
    const ttsPauseButton = document.getElementById('tts-pause');
    const ttsStopButton = document.getElementById('tts-stop');
    const ttsVoiceSelect = document.getElementById('tts-voice');
    const ttsRateInput = document.getElementById('tts-rate');
    const ttsPitchInput = document.getElementById('tts-pitch');
    const ttsVolumeInput = document.getElementById('tts-volume');
    
    if (ttsPlayButton) {
        ttsPlayButton.addEventListener('click', function() {
            const pageContent = window.ttsController.extractPageContent();
            window.ttsController.speak(pageContent);
        });
    }
    
    if (ttsPauseButton) {
        ttsPauseButton.addEventListener('click', function() {
            if (window.speechSynthesis.speaking) {
                if (window.ttsController.isPlaying) {
                    window.ttsController.pause();
                } else {
                    window.ttsController.resume();
                }
            }
        });
    }
    
    if (ttsStopButton) {
        ttsStopButton.addEventListener('click', function() {
            window.ttsController.stop();
        });
    }
    
    if (ttsVoiceSelect) {
        // Populate voice options
        setTimeout(() => {
            const voices = window.ttsController.voices;
            ttsVoiceSelect.innerHTML = '';
            
            voices.forEach(voice => {
                const option = document.createElement('option');
                option.value = voice.voiceURI;
                option.textContent = `${voice.name} (${voice.lang})`;
                if (voice === window.ttsController.selectedVoice) {
                    option.selected = true;
                }
                ttsVoiceSelect.appendChild(option);
            });
        }, 100);
        
        ttsVoiceSelect.addEventListener('change', function() {
            window.ttsController.setVoice(this.value);
        });
    }
    
    if (ttsRateInput) {
        ttsRateInput.addEventListener('change', function() {
            window.ttsController.setRate(this.value);
        });
    }
    
    if (ttsPitchInput) {
        ttsPitchInput.addEventListener('change', function() {
            window.ttsController.setPitch(this.value);
        });
    }
    
    if (ttsVolumeInput) {
        ttsVolumeInput.addEventListener('change', function() {
            window.ttsController.setVolume(this.value);
        });
    }
});
