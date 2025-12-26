import { jsxs, jsx } from "react/jsx-runtime";
import { C as Card } from "./card-D8SB2yrw.js";
import { V as VideoPlayer } from "./video-player-DbcUPn7s.js";
import { c as cn } from "./utils-BmtPBcb0.js";
import { usePage } from "@inertiajs/react";
import { Renderer } from "richtor";
/* empty css                 */
import DocumentViewer from "./document-viewer-Cu3KnL-a.js";
import EmbedViewer from "./embed-viewer-CRjXuKs5.js";
import LessonControl from "./lesson-control-2pONF3aa.js";
import "react";
import "plyr-react";
/* empty css                */
import "clsx";
import "tailwind-merge";
import "lucide-react";
import "./button-jZyzwgdo.js";
import "@radix-ui/react-slot";
import "class-variance-authority";
const LessonViewer = ({ lesson }) => {
  const { props } = usePage();
  const { translate } = props;
  const { frontend } = translate;
  return lesson ? /* @__PURE__ */ jsxs(Card, { className: cn("group lesson-container relative"), children: [
    /* @__PURE__ */ jsx(LessonControl, { className: "opacity-0 transition-all duration-300 group-hover:opacity-100" }),
    ["video_url", "video"].includes(lesson.lesson_type) && /* @__PURE__ */ jsx(
      VideoPlayer,
      {
        source: {
          type: "video",
          sources: [
            {
              src: lesson.lesson_src || "",
              type: "video/mp4"
            }
          ]
        }
      }
    ),
    lesson.lesson_type === "document" && /* @__PURE__ */ jsx(DocumentViewer, { src: lesson.lesson_src || "" }),
    lesson.lesson_type === "embed" && /* @__PURE__ */ jsx(EmbedViewer, { src: lesson.lesson_src || "" }),
    lesson.lesson_type === "text" && /* @__PURE__ */ jsx("div", { className: "h-full w-full overflow-y-auto", children: /* @__PURE__ */ jsx(Renderer, { value: lesson.lesson_src || "" }) }),
    lesson.lesson_type === "image" && /* @__PURE__ */ jsx("div", { className: "flex h-full w-full items-center justify-center overflow-y-auto", children: /* @__PURE__ */ jsx("img", { className: "h-full max-h-[calc(100vh-60px)] min-h-[80vh]", src: lesson.lesson_src }) })
  ] }) : /* @__PURE__ */ jsx(Card, { className: "min-h-[60vh] w-full overflow-hidden rounded-lg", children: /* @__PURE__ */ jsx("div", { className: "flex h-full items-center justify-center", children: /* @__PURE__ */ jsx("p", { children: frontend.no_lesson_found }) }) });
};
export {
  LessonViewer as default
};
