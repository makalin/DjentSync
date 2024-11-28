<!DOCTYPE html><html><head>
  <title>Djent Drums Generator</title>
</head><body>

  <div>
    <label for="tempo">Tempo:</label>
    <input type="number" id="tempo" value="120">
    <button onclick="startDjentDrums()">Start</button>
    <button onclick="stopDjentDrums()">Stop</button>
  </div>

<script>
    let context;
    let analyser;
    let gainNode;
    let kickSample;
    let hiHatSample;
    let snareSample;
    let tempo = 90;
    let lastSampleTime = 0;
    let isPlaying = false;

    function startDjentDrums() {
      tempo = document.getElementById('tempo').value;

      if (context === undefined) {
        context = new AudioContext();
        analyser = context.createAnalyser();
        gainNode = context.createGain();
        analyser.fftSize = 2048;
        gainNode.connect(context.destination);
      }

      if (kickSample === undefined) {
        kickSample = context.createBufferSource();
        fetch('kick.wav')
          .then(response => response.arrayBuffer())
          .then(arrayBuffer => context.decodeAudioData(arrayBuffer))
          .then(buffer => kickSample.buffer = buffer)
          .then(() => kickSample.connect(gainNode))
          .then(() => kickSample.loop = true)
          .then(() => kickSample.start(0));
      }

      if (hiHatSample === undefined) {
        hiHatSample = context.createBufferSource();
        fetch('hi-hat.wav')
          .then(response => response.arrayBuffer())
          .then(arrayBuffer => context.decodeAudioData(arrayBuffer))
          .then(buffer => hiHatSample.buffer = buffer)
          .then(() => hiHatSample.connect(gainNode))
          .then(() => hiHatSample.loop = true)
          .then(() => hiHatSample.start(0));
      }

      if (snareSample === undefined) {
        snareSample = context.createBufferSource();
        fetch('snare.wav')
          .then(response => response.arrayBuffer())
          .then(arrayBuffer => context.decodeAudioData(arrayBuffer))
          .then(buffer => snareSample.buffer = buffer)
          .then(() => snareSample.connect(gainNode))
          .then(() => snareSample.loop = true)
          .then(() => snareSample.start(0));
      }

      isPlaying = true;

      const time = context.currentTime;
      lastSampleTime = time;
      analyser.getByteTimeDomainData(analyser.fftSize, (data) => {
        for (let i = 0; i < data.length; i++) {
          const sample = data[i] / 128.0;
          if (Math.abs(sample) > 0.1) {
            if (time - lastSampleTime > 60 / tempo / 4) {
              if (i % 4 === 0) {
                hiHatSample.noteGrainOn(time, 0, 0.1);
              }
              if (i % 3 === 0) {
                snareSample.noteGrainOn(time, 1, 0.1);
              }
              if (i % 12 === 0) {
                kickSample.noteGrainOn(time, 0, 0.5);
              }
              lastSampleTime = time;
            }
          }
        }
      });

      requestAnimationFrame(startDjentDrums);
    }

    function stopDjentDrums() {
      isPlaying = false;
      kickSample.stop();
      hiHatSample.stop();
      snareSample.stop();
    }

</script></body></html>