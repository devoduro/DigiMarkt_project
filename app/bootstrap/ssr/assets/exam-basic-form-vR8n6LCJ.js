import { jsxs, jsx } from "react/jsx-runtime";
import { I as InputError } from "./input-error-CEW4jhey.js";
import { I as Input } from "./input-C6-Ta46A.js";
import { L as Label } from "./label-Dd_w2I6M.js";
import { S as Select, a as SelectTrigger, b as SelectValue, c as SelectContent, d as SelectItem } from "./select-BxPdBi6V.js";
import { T as Textarea } from "./textarea-DctRxpgE.js";
import { o as onHandleChange } from "./inertia-BtwbgBI3.js";
import { useEffect } from "react";
import { Editor } from "richtor";
/* empty css                 */
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
import "@radix-ui/react-label";
import "class-variance-authority";
import "@radix-ui/react-select";
import "lucide-react";
const ExamBasicForm = ({ data, setData, errors, categories, isEdit = false }) => {
  var _a;
  useEffect(() => {
    if (!isEdit && data.title) {
      const slug = data.title.toLowerCase().replace(/[^a-z0-9]+/g, "-").replace(/^-+|-+$/g, "");
      setData("slug", slug);
    }
  }, [data.title, isEdit]);
  return /* @__PURE__ */ jsxs("div", { className: "space-y-4", children: [
    /* @__PURE__ */ jsxs("div", { children: [
      /* @__PURE__ */ jsx(Label, { htmlFor: "title", children: "Exam Title *" }),
      /* @__PURE__ */ jsx(Input, { id: "title", name: "title", value: data.title, onChange: (e) => onHandleChange(e, setData), placeholder: "Enter exam title", required: true }),
      /* @__PURE__ */ jsx(InputError, { message: errors.title })
    ] }),
    /* @__PURE__ */ jsxs("div", { children: [
      /* @__PURE__ */ jsx(Label, { htmlFor: "slug", children: "Slug *" }),
      /* @__PURE__ */ jsx(Input, { id: "slug", name: "slug", value: data.slug, onChange: (e) => onHandleChange(e, setData), placeholder: "exam-slug", required: true }),
      /* @__PURE__ */ jsx(InputError, { message: errors.slug })
    ] }),
    /* @__PURE__ */ jsxs("div", { children: [
      /* @__PURE__ */ jsx(Label, { htmlFor: "exam_category_id", children: "Category *" }),
      /* @__PURE__ */ jsxs(
        Select,
        {
          name: "exam_category_id",
          value: (_a = data.exam_category_id) == null ? void 0 : _a.toString(),
          onValueChange: (value) => setData("exam_category_id", parseInt(value)),
          children: [
            /* @__PURE__ */ jsx(SelectTrigger, { children: /* @__PURE__ */ jsx(SelectValue, { placeholder: "Select category" }) }),
            /* @__PURE__ */ jsx(SelectContent, { children: categories.map((category) => /* @__PURE__ */ jsx(SelectItem, { value: category.id.toString(), children: category.title }, category.id)) })
          ]
        }
      ),
      /* @__PURE__ */ jsx(InputError, { message: errors.exam_category_id })
    ] }),
    /* @__PURE__ */ jsxs("div", { children: [
      /* @__PURE__ */ jsx(Label, { htmlFor: "level", children: "Difficulty Level" }),
      /* @__PURE__ */ jsxs(Select, { name: "level", value: data.level || "", onValueChange: (value) => setData("level", value), children: [
        /* @__PURE__ */ jsx(SelectTrigger, { children: /* @__PURE__ */ jsx(SelectValue, { placeholder: "Select level" }) }),
        /* @__PURE__ */ jsxs(SelectContent, { children: [
          /* @__PURE__ */ jsx(SelectItem, { value: "beginner", children: "Beginner" }),
          /* @__PURE__ */ jsx(SelectItem, { value: "intermediate", children: "Intermediate" }),
          /* @__PURE__ */ jsx(SelectItem, { value: "advanced", children: "Advanced" }),
          /* @__PURE__ */ jsx(SelectItem, { value: "expert", children: "Expert" })
        ] })
      ] }),
      /* @__PURE__ */ jsx(InputError, { message: errors.level })
    ] }),
    /* @__PURE__ */ jsxs("div", { children: [
      /* @__PURE__ */ jsx(Label, { htmlFor: "short_description", children: "Short Description" }),
      /* @__PURE__ */ jsx(
        Textarea,
        {
          id: "short_description",
          name: "short_description",
          value: data.short_description,
          onChange: (e) => onHandleChange(e, setData),
          placeholder: "Brief description for exam cards",
          rows: 3
        }
      ),
      /* @__PURE__ */ jsx(InputError, { message: errors.short_description })
    ] }),
    /* @__PURE__ */ jsxs("div", { children: [
      /* @__PURE__ */ jsx(Label, { htmlFor: "description", children: "Full Description" }),
      /* @__PURE__ */ jsx(
        Editor,
        {
          ssr: true,
          output: "html",
          placeholder: {
            paragraph: "Enter detailed exam description...",
            imageCaption: "Type caption for image (optional)"
          },
          contentMinHeight: 256,
          contentMaxHeight: 640,
          initialContent: data.description,
          onContentChange: (value) => setData("description", value)
        }
      ),
      /* @__PURE__ */ jsx(InputError, { message: errors.description })
    ] })
  ] });
};
export {
  ExamBasicForm as default
};
