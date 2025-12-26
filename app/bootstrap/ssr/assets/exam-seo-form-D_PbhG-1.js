import { jsxs, jsx } from "react/jsx-runtime";
import { I as InputError } from "./input-error-CEW4jhey.js";
import { I as Input } from "./input-C6-Ta46A.js";
import { L as Label } from "./label-Dd_w2I6M.js";
import { T as Textarea } from "./textarea-DctRxpgE.js";
import { o as onHandleChange } from "./inertia-BtwbgBI3.js";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
import "react";
import "@radix-ui/react-label";
import "class-variance-authority";
const ExamSeoForm = ({ data, setData, errors }) => {
  return /* @__PURE__ */ jsxs("div", { className: "space-y-4", children: [
    /* @__PURE__ */ jsxs("div", { className: "rounded-lg bg-gray-50 p-4", children: [
      /* @__PURE__ */ jsx("h4", { className: "mb-2 font-semibold text-gray-900", children: "Search Engine Optimization" }),
      /* @__PURE__ */ jsx("p", { className: "text-sm text-gray-600", children: "Help search engines understand your exam better with proper meta tags." })
    ] }),
    /* @__PURE__ */ jsxs("div", { children: [
      /* @__PURE__ */ jsx(Label, { htmlFor: "meta_title", children: "Meta Title" }),
      /* @__PURE__ */ jsx(
        Input,
        {
          id: "meta_title",
          name: "meta_title",
          value: data.meta_title,
          onChange: (e) => onHandleChange(e, setData),
          placeholder: data.title || "Exam title",
          maxLength: 60
        }
      ),
      /* @__PURE__ */ jsxs("p", { className: "mt-1 text-sm text-gray-500", children: [
        (data.meta_title || "").length,
        "/60 characters"
      ] }),
      /* @__PURE__ */ jsx(InputError, { message: errors.meta_title })
    ] }),
    /* @__PURE__ */ jsxs("div", { children: [
      /* @__PURE__ */ jsx(Label, { htmlFor: "meta_description", children: "Meta Description" }),
      /* @__PURE__ */ jsx(
        Textarea,
        {
          id: "meta_description",
          name: "meta_description",
          value: data.meta_description,
          onChange: (e) => onHandleChange(e, setData),
          placeholder: "Brief description for search results",
          rows: 3,
          maxLength: 160
        }
      ),
      /* @__PURE__ */ jsxs("p", { className: "mt-1 text-sm text-gray-500", children: [
        (data.meta_description || "").length,
        "/160 characters"
      ] }),
      /* @__PURE__ */ jsx(InputError, { message: errors.meta_description })
    ] }),
    /* @__PURE__ */ jsxs("div", { children: [
      /* @__PURE__ */ jsx(Label, { htmlFor: "meta_keywords", children: "Meta Keywords" }),
      /* @__PURE__ */ jsx(
        Input,
        {
          id: "meta_keywords",
          name: "meta_keywords",
          value: data.meta_keywords,
          onChange: (e) => onHandleChange(e, setData),
          placeholder: "exam, certification, test, assessment"
        }
      ),
      /* @__PURE__ */ jsx("p", { className: "mt-1 text-sm text-gray-500", children: "Comma-separated keywords" }),
      /* @__PURE__ */ jsx(InputError, { message: errors.meta_keywords })
    ] }),
    /* @__PURE__ */ jsxs("div", { className: "border-t pt-4", children: [
      /* @__PURE__ */ jsxs("div", { className: "mb-4 rounded-lg bg-gray-50 p-4", children: [
        /* @__PURE__ */ jsx("h4", { className: "mb-2 font-semibold text-gray-900", children: "Open Graph (Social Media)" }),
        /* @__PURE__ */ jsx("p", { className: "text-sm text-gray-600", children: "Customize how your exam appears when shared on social media." })
      ] }),
      /* @__PURE__ */ jsxs("div", { children: [
        /* @__PURE__ */ jsx(Label, { htmlFor: "og_title", children: "OG Title" }),
        /* @__PURE__ */ jsx(
          Input,
          {
            id: "og_title",
            name: "og_title",
            value: data.og_title,
            onChange: (e) => onHandleChange(e, setData),
            placeholder: data.title || "Exam title"
          }
        ),
        /* @__PURE__ */ jsx(InputError, { message: errors.og_title })
      ] }),
      /* @__PURE__ */ jsxs("div", { className: "mt-4", children: [
        /* @__PURE__ */ jsx(Label, { htmlFor: "og_description", children: "OG Description" }),
        /* @__PURE__ */ jsx(
          Textarea,
          {
            id: "og_description",
            name: "og_description",
            value: data.og_description,
            onChange: (e) => onHandleChange(e, setData),
            placeholder: "Description for social media shares",
            rows: 3
          }
        ),
        /* @__PURE__ */ jsx(InputError, { message: errors.og_description })
      ] })
    ] }),
    (data.meta_title || data.meta_description) && /* @__PURE__ */ jsxs("div", { className: "mt-6 rounded-lg border bg-white p-4", children: [
      /* @__PURE__ */ jsx("p", { className: "mb-2 text-sm font-semibold text-gray-600", children: "Search Result Preview:" }),
      /* @__PURE__ */ jsxs("div", { className: "space-y-1", children: [
        /* @__PURE__ */ jsx("p", { className: "text-lg font-medium text-blue-600", children: data.meta_title || data.title }),
        /* @__PURE__ */ jsxs("p", { className: "text-sm text-green-700", children: [
          "yoursite.com/exams/",
          data.slug
        ] }),
        /* @__PURE__ */ jsx("p", { className: "text-sm text-gray-600", children: data.meta_description || data.short_description })
      ] })
    ] })
  ] });
};
export {
  ExamSeoForm as default
};
