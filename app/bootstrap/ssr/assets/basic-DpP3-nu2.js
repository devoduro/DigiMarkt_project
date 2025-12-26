import { jsx, jsxs } from "react/jsx-runtime";
import { C as Combobox } from "./combobox-CtfF3flG.js";
import { I as InputError } from "./input-error-CEW4jhey.js";
import { L as LoadingButton } from "./loading-button-C4Hk_jCd.js";
import { C as Card } from "./card-D8SB2yrw.js";
import { I as Input } from "./input-C6-Ta46A.js";
import { L as Label } from "./label-Dd_w2I6M.js";
import { S as Select, a as SelectTrigger, b as SelectValue, c as SelectContent, d as SelectItem } from "./select-BxPdBi6V.js";
import { T as Textarea } from "./textarea-DctRxpgE.js";
import { o as onHandleChange } from "./inertia-BtwbgBI3.js";
import { usePage, useForm } from "@inertiajs/react";
import { useMemo } from "react";
import { Editor } from "richtor";
/* empty css                 */
import "./button-jZyzwgdo.js";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
import "cmdk";
import "lucide-react";
import "./popover-BV7JTqNd.js";
import "@radix-ui/react-popover";
import "@radix-ui/react-label";
import "@radix-ui/react-select";
const Basic = () => {
  const { props } = usePage();
  const { auth, system, tab, categories, exam, instructors } = props;
  const { data, setData, post, errors, processing } = useForm({
    tab,
    title: exam.title || "",
    short_description: exam.short_description || "",
    description: exam.description || "",
    status: exam.status || "draft",
    level: exam.level || "",
    instructor_id: exam.instructor_id || "",
    exam_category_id: exam.exam_category_id || ""
  });
  const handleSubmit = (e) => {
    e.preventDefault();
    post(route("exams.update", { exam: exam.id }));
  };
  const transformedCategories = useMemo(() => {
    return categories.map((category) => ({
      label: category.title,
      value: category.id.toString()
    }));
  }, [categories]);
  const transformedInstructors = instructors == null ? void 0 : instructors.map((instructor) => ({
    label: instructor.user.name,
    value: instructor.id.toString()
  }));
  const levels = ["beginner", "intermediate", "advanced"];
  const statuses = ["draft", "published", "archived"];
  const selectedCategory = categories.find((cat) => cat.id === data.exam_category_id);
  return /* @__PURE__ */ jsx(Card, { className: "container p-4 sm:p-6", children: /* @__PURE__ */ jsxs("form", { onSubmit: handleSubmit, className: "space-y-4", children: [
    /* @__PURE__ */ jsxs("div", { children: [
      /* @__PURE__ */ jsx(Label, { children: "Exam Title *" }),
      /* @__PURE__ */ jsx(Input, { name: "title", value: data.title, onChange: (e) => onHandleChange(e, setData), placeholder: "Enter exam title" }),
      /* @__PURE__ */ jsx(InputError, { message: errors.title })
    ] }),
    /* @__PURE__ */ jsxs("div", { children: [
      /* @__PURE__ */ jsx(Label, { children: "Short Description" }),
      /* @__PURE__ */ jsx(
        Textarea,
        {
          rows: 5,
          name: "short_description",
          value: data.short_description,
          onChange: (e) => onHandleChange(e, setData),
          placeholder: "Brief description for exam cards"
        }
      ),
      /* @__PURE__ */ jsx(InputError, { message: errors.short_description })
    ] }),
    /* @__PURE__ */ jsxs("div", { children: [
      /* @__PURE__ */ jsx(Label, { children: "Description" }),
      /* @__PURE__ */ jsx(
        Editor,
        {
          ssr: true,
          output: "html",
          placeholder: {
            paragraph: "Enter detailed exam description...",
            imageCaption: "Enter detailed exam description..."
          },
          contentMinHeight: 256,
          contentMaxHeight: 640,
          initialContent: data.description,
          onContentChange: (value) => setData((prev) => ({
            ...prev,
            description: value
          }))
        }
      ),
      /* @__PURE__ */ jsx(InputError, { message: errors.description })
    ] }),
    auth.user.role === "admin" && system.sub_type === "collaborative" && /* @__PURE__ */ jsxs("div", { children: [
      /* @__PURE__ */ jsx(Label, { children: "Exam Instructor *" }),
      /* @__PURE__ */ jsx(
        Combobox,
        {
          defaultValue: data.instructor_id.toString(),
          data: transformedInstructors || [],
          placeholder: "Select instructor",
          onSelect: (selected) => setData("instructor_id", selected.value)
        }
      ),
      /* @__PURE__ */ jsx(InputError, { message: errors.instructor_id })
    ] }),
    /* @__PURE__ */ jsxs("div", { className: "grid gap-6 md:grid-cols-2", children: [
      /* @__PURE__ */ jsxs("div", { children: [
        /* @__PURE__ */ jsx(Label, { children: "Category *" }),
        /* @__PURE__ */ jsx(
          Combobox,
          {
            data: transformedCategories,
            placeholder: "Select category",
            defaultValue: (selectedCategory == null ? void 0 : selectedCategory.title) || "",
            onSelect: (selected) => {
              setData("exam_category_id", selected.value);
            }
          }
        ),
        /* @__PURE__ */ jsx(InputError, { message: errors.exam_category_id })
      ] }),
      /* @__PURE__ */ jsxs("div", { children: [
        /* @__PURE__ */ jsx(Label, { children: "Difficulty Level *" }),
        /* @__PURE__ */ jsxs(Select, { value: data.level, onValueChange: (value) => setData("level", value), children: [
          /* @__PURE__ */ jsx(SelectTrigger, { children: /* @__PURE__ */ jsx(SelectValue, { placeholder: "Select level" }) }),
          /* @__PURE__ */ jsx(SelectContent, { children: levels.map((level) => /* @__PURE__ */ jsx(SelectItem, { value: level, className: "capitalize", children: level }, level)) })
        ] }),
        /* @__PURE__ */ jsx(InputError, { message: errors.level })
      ] }),
      /* @__PURE__ */ jsxs("div", { children: [
        /* @__PURE__ */ jsx(Label, { children: "Status *" }),
        /* @__PURE__ */ jsxs(Select, { value: data.status, onValueChange: (value) => setData("status", value), children: [
          /* @__PURE__ */ jsx(SelectTrigger, { children: /* @__PURE__ */ jsx(SelectValue, { placeholder: "Select status" }) }),
          /* @__PURE__ */ jsx(SelectContent, { children: statuses.map((status) => /* @__PURE__ */ jsx(SelectItem, { value: status, className: "capitalize", children: status }, status)) })
        ] }),
        /* @__PURE__ */ jsx(InputError, { message: errors.status })
      ] })
    ] }),
    /* @__PURE__ */ jsx("div", { className: "mt-8", children: /* @__PURE__ */ jsx(LoadingButton, { loading: processing, children: "Save Changes" }) })
  ] }) });
};
export {
  Basic as default
};
