import { jsxs, jsx } from "react/jsx-runtime";
import { I as InputError } from "./input-error-CEW4jhey.js";
import { L as LoadingButton } from "./loading-button-C4Hk_jCd.js";
import { B as Button } from "./button-jZyzwgdo.js";
import { D as Dialog, a as DialogTrigger, b as DialogContent, c as DialogHeader, d as DialogTitle } from "./dialog-DD5SXV81.js";
import { L as Label } from "./label-Dd_w2I6M.js";
import { S as Select, a as SelectTrigger, b as SelectValue, c as SelectContent, d as SelectItem } from "./select-BxPdBi6V.js";
import { c as cn } from "./utils-BmtPBcb0.js";
import { usePage, useForm, Link, router } from "@inertiajs/react";
import { useState } from "react";
import { Editor } from "richtor";
/* empty css                 */
import "lucide-react";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "@radix-ui/react-dialog";
import "@radix-ui/react-label";
import "@radix-ui/react-select";
import "clsx";
import "tailwind-merge";
const ExamUpdateHeader = () => {
  const [open, setOpen] = useState(false);
  const { props } = usePage();
  const user = props.auth.user;
  const { exam } = props;
  const statuses = ["draft", "published", "archived"].filter((status) => status !== exam.status);
  const { data, post, setData, processing, errors, reset } = useForm({
    tab: "status",
    status: "",
    feedback: ""
  });
  const handleSubmit = (e) => {
    e.preventDefault();
    post(route("exams.update", exam.id), {
      onSuccess: () => {
        reset();
        setOpen(false);
      }
    });
  };
  return /* @__PURE__ */ jsxs("div", { className: "flex flex-wrap items-center gap-4 md:gap-6", children: [
    /* @__PURE__ */ jsx(Button, { children: /* @__PURE__ */ jsx(Link, { href: route("exams.details", { slug: exam.slug, id: exam.id }), children: "View Exam" }) }),
    /* @__PURE__ */ jsx(
      Button,
      {
        className: cn(
          "capitalize",
          exam.status === "published" ? "bg-green-500 hover:bg-green-600" : exam.status === "archived" ? "bg-red-500 hover:bg-red-600" : "bg-gray-500 hover:bg-gray-600"
        ),
        disabled: true,
        children: exam.status
      }
    ),
    user.role === "instructor" && exam.status !== "published" && /* @__PURE__ */ jsx(Button, { onClick: () => router.put(route("exams.status", { exam: exam.id }), { status: "published" }), children: "Submit for Review" }),
    user.role === "admin" && /* @__PURE__ */ jsxs(Dialog, { open, onOpenChange: setOpen, children: [
      /* @__PURE__ */ jsx(DialogTrigger, { asChild: true, children: /* @__PURE__ */ jsx(Button, { className: "capitalize", children: "Change Status" }) }),
      /* @__PURE__ */ jsxs(DialogContent, { children: [
        /* @__PURE__ */ jsx(DialogHeader, { children: /* @__PURE__ */ jsx(DialogTitle, { children: "Change Exam Status" }) }),
        /* @__PURE__ */ jsxs("form", { onSubmit: handleSubmit, className: "space-y-4", children: [
          /* @__PURE__ */ jsxs("div", { children: [
            /* @__PURE__ */ jsx(Label, { children: "Status" }),
            /* @__PURE__ */ jsxs(Select, { required: true, value: data.status, onValueChange: (value) => setData("status", value), children: [
              /* @__PURE__ */ jsx(SelectTrigger, { children: /* @__PURE__ */ jsx(SelectValue, { placeholder: "Select status" }) }),
              /* @__PURE__ */ jsx(SelectContent, { children: statuses.map((status) => /* @__PURE__ */ jsx(SelectItem, { value: status, className: "capitalize", children: status }, status)) })
            ] }),
            /* @__PURE__ */ jsx(InputError, { message: errors.status })
          ] }),
          /* @__PURE__ */ jsxs("div", { className: "pb-6", children: [
            /* @__PURE__ */ jsxs(Label, { children: [
              "Feedback ",
              /* @__PURE__ */ jsx("span", { className: "text-gray-500", children: "(Optional)" })
            ] }),
            /* @__PURE__ */ jsx(
              Editor,
              {
                ssr: true,
                output: "html",
                placeholder: {
                  paragraph: "Enter feedback for instructor...",
                  imageCaption: "Enter image caption..."
                },
                contentMinHeight: 256,
                contentMaxHeight: 640,
                initialContent: data.feedback,
                onContentChange: (value) => setData((prev) => ({
                  ...prev,
                  feedback: value
                }))
              }
            ),
            /* @__PURE__ */ jsx(InputError, { message: errors.feedback })
          ] }),
          /* @__PURE__ */ jsx(LoadingButton, { loading: processing, className: "w-full", children: "Update Status" })
        ] })
      ] })
    ] })
  ] });
};
export {
  ExamUpdateHeader as default
};
