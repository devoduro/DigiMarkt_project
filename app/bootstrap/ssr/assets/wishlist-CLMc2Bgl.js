import { jsxs, jsx } from "react/jsx-runtime";
import { C as CourseCard1 } from "./course-card-1-BLS66nbX.js";
import { E as ExamCard1 } from "./exam-card-1-DbrZWQ_h.js";
import { C as Card } from "./card-D8SB2yrw.js";
import { usePage } from "@inertiajs/react";
import "./button-jZyzwgdo.js";
import "react";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
import "./tooltip-DswKljFZ.js";
import "@radix-ui/react-tooltip";
import "lucide-react";
import "./badge-B4crNM73.js";
const Wishlist = () => {
  const { courseWishlists, examWishlists, translate } = usePage().props;
  const { frontend } = translate;
  return /* @__PURE__ */ jsxs("div", { className: "space-y-6", children: [
    /* @__PURE__ */ jsxs("div", { children: [
      /* @__PURE__ */ jsx("h2", { className: "mb-2 text-xl font-semibold", children: "Course Wishlist" }),
      courseWishlists && courseWishlists.length > 0 ? /* @__PURE__ */ jsx("div", { className: "grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3", children: courseWishlists.map(({ id, course }) => /* @__PURE__ */ jsx(CourseCard1, { course, wishlists: courseWishlists }, id)) }) : /* @__PURE__ */ jsx(Card, { className: "flex items-center justify-center p-6", children: /* @__PURE__ */ jsx("p", { children: frontend.no_wishlist_items }) })
    ] }),
    /* @__PURE__ */ jsxs("div", { children: [
      /* @__PURE__ */ jsx("h2", { className: "mb-2 text-xl font-semibold", children: "Exam Wishlist" }),
      examWishlists && examWishlists.length > 0 ? /* @__PURE__ */ jsx("div", { className: "grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3", children: examWishlists.map(({ id, exam }) => /* @__PURE__ */ jsx(ExamCard1, { exam, viewType: "grid" }, id)) }) : /* @__PURE__ */ jsx(Card, { className: "flex items-center justify-center p-6", children: /* @__PURE__ */ jsx("p", { children: frontend.no_wishlist_items }) })
    ] })
  ] });
};
export {
  Wishlist as default
};
