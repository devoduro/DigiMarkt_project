import { jsxs, jsx } from "react/jsx-runtime";
import { I as InputError } from "./input-error-CEW4jhey.js";
import { L as LoadingButton } from "./loading-button-C4Hk_jCd.js";
import { T as Textarea } from "./textarea-DctRxpgE.js";
import { o as onHandleChange } from "./inertia-BtwbgBI3.js";
import { useForm } from "@inertiajs/react";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
import "lucide-react";
import "react";
import "./button-jZyzwgdo.js";
import "@radix-ui/react-slot";
import "class-variance-authority";
const RequirementForm = ({ requirement }) => {
  const {
    data,
    setData,
    put,
    delete: destroy,
    errors,
    processing
  } = useForm({
    requirement: requirement ? requirement.requirement : ""
  });
  const handleSubmit = (e) => {
    e.preventDefault();
    put(route("exam-requirements.update", { exam_requirement: requirement.id }));
  };
  const handleDelete = () => {
    destroy(route("exam-requirements.destroy", { exam_requirement: requirement.id }));
  };
  return /* @__PURE__ */ jsxs("form", { onSubmit: handleSubmit, className: "space-y-2", children: [
    /* @__PURE__ */ jsxs("div", { children: [
      /* @__PURE__ */ jsx(
        Textarea,
        {
          required: true,
          name: "requirement",
          value: data.requirement || "",
          placeholder: "Enter exam requirement",
          onChange: (e) => onHandleChange(e, setData)
        }
      ),
      /* @__PURE__ */ jsx(InputError, { message: errors.requirement })
    ] }),
    /* @__PURE__ */ jsxs("div", { className: "flex items-center justify-end gap-2", children: [
      /* @__PURE__ */ jsx(
        LoadingButton,
        {
          type: "button",
          variant: "outline",
          loading: processing,
          onClick: handleDelete,
          className: "h-7 w-full bg-red-50 text-xs hover:bg-red-100",
          children: "Remove"
        }
      ),
      /* @__PURE__ */ jsx(LoadingButton, { variant: "secondary", className: "h-7 w-full text-xs", loading: processing, children: "Save" })
    ] })
  ] });
};
export {
  RequirementForm as default
};
