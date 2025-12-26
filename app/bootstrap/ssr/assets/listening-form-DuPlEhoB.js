import { jsxs, jsx } from "react/jsx-runtime";
import { C as ChunkedUploaderInput } from "./chunked-uploader-input-MwXGR7K4.js";
import { I as InputError } from "./input-error-CEW4jhey.js";
import { I as Input } from "./input-C6-Ta46A.js";
import { L as Label } from "./label-Dd_w2I6M.js";
import { R as RadioGroup, a as RadioGroupItem } from "./radio-group-sSS5HHUP.js";
import { T as Textarea } from "./textarea-DctRxpgE.js";
import { useState } from "react";
import "./button-jZyzwgdo.js";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
import "axios";
import "lucide-react";
import "sonner";
import "@radix-ui/react-label";
import "@radix-ui/react-radio-group";
const ListeningForm = ({ data, setData, errors, isSubmit, setIsFileSelected, setIsFileUploaded, setIsSubmit }) => {
  var _a, _b, _c;
  const [audioSource, setAudioSource] = useState(((_a = data.options) == null ? void 0 : _a.audio_source) || "url");
  const updateAudioSource = (source) => {
    var _a2;
    setAudioSource(source);
    setData("options", {
      ...data.options,
      audio_source: source,
      audio_url: source === "url" ? ((_a2 = data.options) == null ? void 0 : _a2.audio_url) || "" : ""
    });
  };
  return /* @__PURE__ */ jsxs("div", { className: "space-y-4", children: [
    /* @__PURE__ */ jsxs("div", { children: [
      /* @__PURE__ */ jsx(Label, { children: "Instructions" }),
      /* @__PURE__ */ jsxs("div", { className: "rounded-md bg-blue-50 p-3 text-sm text-blue-900", children: [
        /* @__PURE__ */ jsx("p", { className: "mb-1 font-medium", children: "How listening questions work:" }),
        /* @__PURE__ */ jsx("p", { children: "• Upload or link to an audio file" }),
        /* @__PURE__ */ jsx("p", { children: "• Students listen to the audio and answer the question" }),
        /* @__PURE__ */ jsx("p", { children: "• You can use multiple choice options or short answer" })
      ] })
    ] }),
    /* @__PURE__ */ jsxs("div", { children: [
      /* @__PURE__ */ jsx(Label, { children: "Audio Source" }),
      /* @__PURE__ */ jsxs(RadioGroup, { value: audioSource, onValueChange: (value) => updateAudioSource(value), className: "flex gap-4 pt-2", children: [
        /* @__PURE__ */ jsxs("div", { className: "flex items-center space-x-2", children: [
          /* @__PURE__ */ jsx(RadioGroupItem, { value: "url", id: "url" }),
          /* @__PURE__ */ jsx(Label, { htmlFor: "url", className: "cursor-pointer font-normal", children: "Audio URL" })
        ] }),
        /* @__PURE__ */ jsxs("div", { className: "flex items-center space-x-2", children: [
          /* @__PURE__ */ jsx(RadioGroupItem, { value: "upload", id: "upload" }),
          /* @__PURE__ */ jsx(Label, { htmlFor: "upload", className: "cursor-pointer font-normal", children: "Upload File" })
        ] })
      ] })
    ] }),
    audioSource === "url" ? /* @__PURE__ */ jsxs("div", { children: [
      /* @__PURE__ */ jsx(Label, { children: "Audio URL *" }),
      /* @__PURE__ */ jsx(
        Input,
        {
          type: "url",
          placeholder: "https://example.com/audio.mp3",
          value: ((_b = data.options) == null ? void 0 : _b.audio_url) || "",
          onChange: (e) => setData("options", {
            ...data.options,
            audio_url: e.target.value
          })
        }
      ),
      /* @__PURE__ */ jsx("p", { className: "mt-1 text-xs text-gray-500", children: "Direct link to an audio file (mp3, wav, ogg)" })
    ] }) : /* @__PURE__ */ jsx("div", { className: "space-y-3", children: /* @__PURE__ */ jsxs("div", { children: [
      /* @__PURE__ */ jsx(Label, { children: "Upload Audio File *" }),
      /* @__PURE__ */ jsx(
        ChunkedUploaderInput,
        {
          isSubmit,
          filetype: "audio",
          delayUpload: true,
          onFileSelected: (file) => {
            setIsFileSelected(true);
          },
          onFileUploaded: (fileData) => {
            setIsFileUploaded(true);
            setData("options", {
              ...data.options,
              new_audio_url: fileData.file_url
            });
          },
          onError: (errors2) => {
            setIsSubmit(false);
            setIsFileSelected(false);
          },
          onCancelUpload: () => {
            setIsSubmit(false);
            setIsFileSelected(false);
          }
        }
      ),
      /* @__PURE__ */ jsx("p", { className: "mt-1 text-xs text-gray-500", children: "Supported formats: MP3, WAV, OGG (Max 100MB)" })
    ] }) }),
    /* @__PURE__ */ jsxs("div", { children: [
      /* @__PURE__ */ jsx(Label, { children: "Answer Instructions" }),
      /* @__PURE__ */ jsx(
        Textarea,
        {
          placeholder: "What should students answer after listening? (e.g., 'Summarize the main points' or 'Answer the following questions')",
          rows: 3,
          value: ((_c = data.options) == null ? void 0 : _c.instructions) || "",
          onChange: (e) => setData("options", {
            ...data.options,
            instructions: e.target.value
          })
        }
      )
    ] }),
    /* @__PURE__ */ jsx(InputError, { message: errors.options })
  ] });
};
export {
  ListeningForm as default
};
