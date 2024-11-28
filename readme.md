# Djent Drums Generator

This project is a web application that generates djent-style drum beats in real-time while synchronizing with live guitar input. The application listens to the guitar, detects specific notes (like "E"), and triggers drum samples dynamically. Users can set the tempo and control the playback.

## Features

- **Tempo Control**: Adjust the tempo of the drum track with a simple input.
- **Dynamic Kick Samples**: Automatically play kick drum samples when the guitar note "E" is detected.
- **Predefined Drum Pattern**:
  - Hi-hats play in a 4/4 time signature.
  - Snares hit on the 3rd beat of each measure.
- **Start/Stop Controls**: Easily start or stop the drum track.

## How It Works

1. The application listens to the guitar input via microphone or connected audio devices.
2. Using real-time audio analysis, it detects the "E" note and triggers a kick drum sound.
3. The hi-hats and snare follow a predefined 4/4 pattern.

## Setup Instructions

1. Clone the repository:
   ```bash
   git clone https://github.com/yourusername/djent-drums-generator.git
   ```

2. Move to the project directory:
   ```bash
   cd djent-drums-generator
   ```

3. Ensure you have a PHP server installed (e.g., XAMPP, WAMP, or PHP CLI).

4. Start the PHP server:
   ```bash
   php -S localhost:8000
   ```

5. Open your web browser and navigate to:
   ```
   http://localhost:8000/index.php
   ```

## Requirements

- PHP 7.4 or later
- Modern web browser with JavaScript support
- Audio input device (e.g., microphone or guitar interface)

## Usage

1. Set the desired tempo using the input box.
2. Click **Start** to begin the drum generation.
3. Play guitar, and the app will automatically sync the drums.
4. Click **Stop** to end the session.

## Technologies Used

- PHP: Backend scripting.
- HTML/CSS: Frontend structure and styling.
- JavaScript: Real-time drum synchronization and controls.

## Future Enhancements

- Implement advanced audio signal processing for better guitar note detection.
- Add customizable drum patterns.
- Include support for different drum kits and samples.
- Develop a visual metronome to aid synchronization.

## Contributing

Contributions are welcome! Feel free to fork this repository and submit a pull request.

## License

This project is licensed under the MIT License. See the LICENSE file for details.

## Acknowledgments

- Inspired by the djent music genre and the need for real-time guitar and drum synchronization.
