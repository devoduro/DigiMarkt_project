import { jsxs, jsx } from "react/jsx-runtime";
import { B as Button } from "./button-jZyzwgdo.js";
import { L as Label } from "./label-Dd_w2I6M.js";
import { R as RadioGroup, a as RadioGroupItem } from "./radio-group-sSS5HHUP.js";
import { S as Slider } from "./slider-BogRbGTU.js";
import { Pause, Play, Volume2, X } from "lucide-react";
import { useRef, useState, useEffect } from "react";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
import "@radix-ui/react-label";
import "@radix-ui/react-radio-group";
import "@radix-ui/react-slider";
const ListeningQuestion = ({ question, answer, onAnswerChange }) => {
  var _a;
  const audioRef = useRef(null);
  const [isPlaying, setIsPlaying] = useState(false);
  const [currentTime, setCurrentTime] = useState(0);
  const [duration, setDuration] = useState(0);
  const [volume, setVolume] = useState(0.8);
  const selectedOption = (answer == null ? void 0 : answer.option_id) || "";
  const audioUrl = ((_a = question.options) == null ? void 0 : _a.audio_url) || "";
  const options = question.question_options || [];
  useEffect(() => {
    const audio = audioRef.current;
    if (!audio) return;
    const updateTime = () => setCurrentTime(audio.currentTime);
    const updateDuration = () => setDuration(audio.duration);
    const handleEnded = () => setIsPlaying(false);
    audio.addEventListener("timeupdate", updateTime);
    audio.addEventListener("loadedmetadata", updateDuration);
    audio.addEventListener("ended", handleEnded);
    return () => {
      audio.removeEventListener("timeupdate", updateTime);
      audio.removeEventListener("loadedmetadata", updateDuration);
      audio.removeEventListener("ended", handleEnded);
    };
  }, []);
  useEffect(() => {
    if (audioRef.current) {
      audioRef.current.volume = volume;
    }
  }, [volume]);
  const togglePlay = () => {
    const audio = audioRef.current;
    if (!audio) return;
    if (isPlaying) {
      audio.pause();
    } else {
      audio.play();
    }
    setIsPlaying(!isPlaying);
  };
  const handleSeek = (value) => {
    const audio = audioRef.current;
    if (!audio) return;
    audio.currentTime = value[0];
    setCurrentTime(value[0]);
  };
  const handleChange = (value) => {
    onAnswerChange({
      question_id: question.id,
      option_id: parseInt(value)
    });
  };
  const handleClear = () => {
    onAnswerChange(null);
  };
  const formatTime = (time) => {
    const minutes = Math.floor(time / 60);
    const seconds = Math.floor(time % 60);
    return `${minutes}:${seconds.toString().padStart(2, "0")}`;
  };
  return /* @__PURE__ */ jsxs("div", { className: "space-y-4", children: [
    /* @__PURE__ */ jsx("p", { className: "text-sm text-gray-600", children: "Listen to the audio carefully and select the correct answer:" }),
    /* @__PURE__ */ jsxs("div", { className: "from-primary/10 to-primary/5 rounded-lg border bg-gradient-to-br p-6", children: [
      /* @__PURE__ */ jsx("audio", { ref: audioRef, src: audioUrl, preload: "metadata" }),
      /* @__PURE__ */ jsx("div", { className: "mb-4 flex justify-center", children: /* @__PURE__ */ jsx(Button, { onClick: togglePlay, size: "lg", className: "h-16 w-16 rounded-full", disabled: !audioUrl, children: isPlaying ? /* @__PURE__ */ jsx(Pause, { className: "h-6 w-6" }) : /* @__PURE__ */ jsx(Play, { className: "ml-1 h-6 w-6" }) }) }),
      /* @__PURE__ */ jsx("div", { className: "mb-2", children: /* @__PURE__ */ jsx(
        Slider,
        {
          value: [currentTime],
          max: duration || 100,
          step: 0.1,
          onValueChange: handleSeek,
          disabled: !audioUrl || !duration,
          className: "cursor-pointer"
        }
      ) }),
      /* @__PURE__ */ jsxs("div", { className: "mb-4 flex justify-between text-sm text-gray-600", children: [
        /* @__PURE__ */ jsx("span", { children: formatTime(currentTime) }),
        /* @__PURE__ */ jsx("span", { children: formatTime(duration) })
      ] }),
      /* @__PURE__ */ jsxs("div", { className: "flex items-center gap-3", children: [
        /* @__PURE__ */ jsx(Volume2, { className: "h-4 w-4 text-gray-600" }),
        /* @__PURE__ */ jsx(Slider, { value: [volume], max: 1, step: 0.1, onValueChange: (values) => setVolume(values[0]), className: "w-24" })
      ] })
    ] }),
    /* @__PURE__ */ jsxs("div", { children: [
      /* @__PURE__ */ jsxs("div", { className: "mb-3 flex items-start justify-between", children: [
        /* @__PURE__ */ jsx("p", { className: "text-sm font-semibold text-gray-700", children: "Select your answer:" }),
        selectedOption && /* @__PURE__ */ jsxs(Button, { variant: "ghost", size: "sm", onClick: handleClear, children: [
          /* @__PURE__ */ jsx(X, { className: "mr-2 h-4 w-4" }),
          "Clear Selection"
        ] })
      ] }),
      /* @__PURE__ */ jsx(RadioGroup, { value: selectedOption.toString(), onValueChange: handleChange, children: /* @__PURE__ */ jsx("div", { className: "space-y-3", children: options.map((option) => /* @__PURE__ */ jsxs(
        "div",
        {
          className: `flex items-start space-x-3 rounded-lg border-2 p-4 transition-colors ${selectedOption === option.id ? "border-primary bg-primary/5" : "border-gray-200 hover:border-gray-300"}`,
          children: [
            /* @__PURE__ */ jsx(RadioGroupItem, { value: option.id.toString(), id: `option-${option.id}`, className: "mt-0.5" }),
            /* @__PURE__ */ jsx(Label, { htmlFor: `option-${option.id}`, className: "flex-1 cursor-pointer font-normal", children: option.option_text })
          ]
        },
        option.id
      )) }) })
    ] }),
    !audioUrl && /* @__PURE__ */ jsx("div", { className: "rounded-lg bg-yellow-50 p-3", children: /* @__PURE__ */ jsxs("p", { className: "text-sm text-yellow-800", children: [
      /* @__PURE__ */ jsx("span", { className: "font-semibold", children: "Note:" }),
      " Audio file is not available for this question."
    ] }) })
  ] });
};
export {
  ListeningQuestion as default
};
