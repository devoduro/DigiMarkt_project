import { jsx, jsxs } from "react/jsx-runtime";
import { I as InputError } from "./input-error-CEW4jhey.js";
import { L as LoadingButton } from "./loading-button-C4Hk_jCd.js";
import { C as Card } from "./card-D8SB2yrw.js";
import { I as Input } from "./input-C6-Ta46A.js";
import { L as Label } from "./label-Dd_w2I6M.js";
import { T as Textarea } from "./textarea-DctRxpgE.js";
import { o as onHandleChange } from "./inertia-BtwbgBI3.js";
import { usePage, useForm } from "@inertiajs/react";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
import "lucide-react";
import "react";
import "./button-jZyzwgdo.js";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "@radix-ui/react-label";
const SEO = () => {
  const { props } = usePage();
  const { tab, exam } = props;
  const { data, setData, post, errors, processing } = useForm({
    tab,
    meta_title: exam.meta_title || "",
    meta_keywords: exam.meta_keywords || "",
    meta_description: exam.meta_description || "",
    og_title: exam.og_title || "",
    og_description: exam.og_description || ""
  });
  const handleSubmit = (e) => {
    e.preventDefault();
    post(route("exams.update", { exam: exam.id }));
  };
  return /* @__PURE__ */ jsx(Card, { className: "p-4 sm:p-6", children: /* @__PURE__ */ jsxs("form", { onSubmit: handleSubmit, className: "space-y-4", children: [
    /* @__PURE__ */ jsxs("div", { children: [
      /* @__PURE__ */ jsx(Label, { children: "Meta Title" }),
      /* @__PURE__ */ jsx(Input, { name: "meta_title", value: data.meta_title, onChange: (e) => onHandleChange(e, setData), placeholder: "Enter meta title for SEO" }),
      /* @__PURE__ */ jsx(InputError, { message: errors.meta_title })
    ] }),
    /* @__PURE__ */ jsxs("div", { children: [
      /* @__PURE__ */ jsx(Label, { children: "Meta Keywords" }),
      /* @__PURE__ */ jsx(
        Textarea,
        {
          rows: 3,
          name: "meta_keywords",
          value: data.meta_keywords,
          onChange: (e) => onHandleChange(e, setData),
          placeholder: "Enter meta keywords separated by commas"
        }
      ),
      /* @__PURE__ */ jsx(InputError, { message: errors.meta_keywords })
    ] }),
    /* @__PURE__ */ jsxs("div", { children: [
      /* @__PURE__ */ jsx(Label, { children: "Meta Description" }),
      /* @__PURE__ */ jsx(
        Textarea,
        {
          rows: 3,
          name: "meta_description",
          value: data.meta_description,
          onChange: (e) => onHandleChange(e, setData),
          placeholder: "Enter meta description for search engines"
        }
      ),
      /* @__PURE__ */ jsx(InputError, { message: errors.meta_description })
    ] }),
    /* @__PURE__ */ jsxs("div", { children: [
      /* @__PURE__ */ jsx(Label, { children: "OG Title" }),
      /* @__PURE__ */ jsx(Input, { name: "og_title", value: data.og_title, onChange: (e) => onHandleChange(e, setData), placeholder: "Enter Open Graph title" }),
      /* @__PURE__ */ jsx(InputError, { message: errors.og_title })
    ] }),
    /* @__PURE__ */ jsxs("div", { children: [
      /* @__PURE__ */ jsx(Label, { children: "OG Description" }),
      /* @__PURE__ */ jsx(
        Textarea,
        {
          rows: 3,
          name: "og_description",
          value: data.og_description,
          onChange: (e) => onHandleChange(e, setData),
          placeholder: "Enter Open Graph description for social media"
        }
      ),
      /* @__PURE__ */ jsx(InputError, { message: errors.og_description })
    ] }),
    /* @__PURE__ */ jsx("div", { className: "mt-8", children: /* @__PURE__ */ jsx(LoadingButton, { loading: processing, children: "Save Changes" }) })
  ] }) });
};
export {
  SEO as default
};
