import { jsxs, jsx } from "react/jsx-runtime";
import { R as RatingStars } from "./rating-stars-Cw4PaRTw.js";
import { A as Avatar, a as AvatarImage, b as AvatarFallback } from "./avatar-Cr_jqfHL.js";
import { B as Button } from "./button-jZyzwgdo.js";
import { usePage, Link } from "@inertiajs/react";
import { Book, Users, Star } from "lucide-react";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
import "react";
import "@radix-ui/react-avatar";
import "@radix-ui/react-slot";
import "class-variance-authority";
const Instructor = () => {
  const { instructor, translate } = usePage().props;
  const { frontend } = translate;
  const {
    user,
    courses_count,
    total_reviews_count,
    total_average_rating,
    total_enrollments_count,
    exams_count,
    total_exam_reviews_count,
    total_exam_average_rating,
    total_exam_instructors_count
  } = instructor;
  return /* @__PURE__ */ jsxs("div", { children: [
    /* @__PURE__ */ jsxs("div", { className: "flex items-center justify-between gap-4", children: [
      /* @__PURE__ */ jsxs("div", { className: "flex items-center gap-4", children: [
        /* @__PURE__ */ jsx(Link, { href: route("instructors.show", instructor.id), children: /* @__PURE__ */ jsxs(Avatar, { className: "h-12 w-12", children: [
          /* @__PURE__ */ jsx(AvatarImage, { src: user.photo || "", alt: "@shadcn", className: "object-cover" }),
          /* @__PURE__ */ jsx(AvatarFallback, { children: "CN" })
        ] }) }),
        /* @__PURE__ */ jsx(Link, { href: route("instructors.show", instructor.id), children: /* @__PURE__ */ jsxs("div", { className: "group", children: [
          /* @__PURE__ */ jsx("h3", { className: "text-xl font-semibold group-hover:underline", children: user.name }),
          /* @__PURE__ */ jsx("p", { className: "text-gray-500", children: user.email })
        ] }) })
      ] }),
      /* @__PURE__ */ jsx(Button, { children: /* @__PURE__ */ jsx(Link, { href: route("instructors.show", instructor.id), children: frontend.view_details }) })
    ] }),
    /* @__PURE__ */ jsxs("div", { className: "mt-6 flex gap-8", children: [
      /* @__PURE__ */ jsxs("div", { className: "flex items-center gap-2", children: [
        /* @__PURE__ */ jsx(Book, { className: "h-5 w-5 text-gray-500" }),
        /* @__PURE__ */ jsxs("span", { children: [
          courses_count,
          " Courses"
        ] })
      ] }),
      /* @__PURE__ */ jsxs("div", { className: "flex items-center gap-2", children: [
        /* @__PURE__ */ jsx(Users, { className: "h-5 w-5 text-gray-500" }),
        /* @__PURE__ */ jsxs("span", { children: [
          total_enrollments_count,
          " ",
          frontend.students
        ] })
      ] }),
      /* @__PURE__ */ jsxs("div", { className: "flex items-center gap-2", children: [
        /* @__PURE__ */ jsx(Star, { className: "h-5 w-5 text-gray-500" }),
        /* @__PURE__ */ jsxs("span", { children: [
          total_reviews_count,
          " Reviews"
        ] })
      ] }),
      /* @__PURE__ */ jsxs("div", { className: "flex items-center gap-2", children: [
        /* @__PURE__ */ jsx("span", { children: total_average_rating ? Number(total_average_rating).toFixed(1) : 0 }),
        /* @__PURE__ */ jsx(RatingStars, { rating: total_average_rating, starClass: "w-4 h-5" })
      ] })
    ] }),
    /* @__PURE__ */ jsxs("div", { className: "mt-6 flex gap-8", children: [
      /* @__PURE__ */ jsxs("div", { className: "flex items-center gap-2", children: [
        /* @__PURE__ */ jsx(Book, { className: "h-5 w-5 text-gray-500" }),
        /* @__PURE__ */ jsxs("span", { children: [
          exams_count,
          " Exams"
        ] })
      ] }),
      /* @__PURE__ */ jsxs("div", { className: "flex items-center gap-2", children: [
        /* @__PURE__ */ jsx(Users, { className: "h-5 w-5 text-gray-500" }),
        /* @__PURE__ */ jsxs("span", { children: [
          total_exam_instructors_count,
          " ",
          frontend.students
        ] })
      ] }),
      /* @__PURE__ */ jsxs("div", { className: "flex items-center gap-2", children: [
        /* @__PURE__ */ jsx(Star, { className: "h-5 w-5 text-gray-500" }),
        /* @__PURE__ */ jsxs("span", { children: [
          total_exam_reviews_count,
          " Reviews"
        ] })
      ] }),
      /* @__PURE__ */ jsxs("div", { className: "flex items-center gap-2", children: [
        /* @__PURE__ */ jsx("span", { children: total_exam_average_rating ? Number(total_exam_average_rating).toFixed(1) : 0 }),
        /* @__PURE__ */ jsx(RatingStars, { rating: total_exam_average_rating, starClass: "w-4 h-5" })
      ] })
    ] })
  ] });
};
export {
  Instructor as default
};
