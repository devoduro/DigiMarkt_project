import { jsxs, jsx } from "react/jsx-runtime";
import { I as InputError } from "./input-error-CEW4jhey.js";
import { L as LoadingButton } from "./loading-button-C4Hk_jCd.js";
import { B as Button } from "./button-jZyzwgdo.js";
import { D as Dialog, a as DialogTrigger, b as DialogContent, c as DialogHeader, d as DialogTitle } from "./dialog-DD5SXV81.js";
import { I as Input } from "./input-C6-Ta46A.js";
import { L as Label } from "./label-Dd_w2I6M.js";
import { S as Select, a as SelectTrigger, b as SelectValue, c as SelectContent, d as SelectItem } from "./select-BxPdBi6V.js";
import { o as onHandleChange } from "./inertia-BtwbgBI3.js";
import { useForm } from "@inertiajs/react";
import { useState, useEffect } from "react";
import { Editor } from "richtor";
/* empty css                 */
import FillBlankForm from "./fill-blank-form-BxaDP-BU.js";
import ListeningForm from "./listening-form-DuPlEhoB.js";
import MatchingForm from "./matching-form-6MBJ4F_R.js";
import MultipleChoiceForm from "./multiple-choice-form-CooCKl0T.js";
import OrderingForm from "./ordering-form-bzyxM0f6.js";
import ShortAnswerForm from "./short-answer-form-BD8f78V5.js";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
import "lucide-react";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "@radix-ui/react-dialog";
import "@radix-ui/react-label";
import "@radix-ui/react-select";
import "./chunked-uploader-input-MwXGR7K4.js";
import "axios";
import "sonner";
import "./radio-group-sSS5HHUP.js";
import "@radix-ui/react-radio-group";
import "./textarea-DctRxpgE.js";
import "./checkbox-CO4DegBm.js";
import "@radix-ui/react-checkbox";
const questionTypes = [
  { value: "multiple_choice", label: "Multiple Choice" },
  { value: "multiple_select", label: "Multiple Select" },
  { value: "matching", label: "Matching" },
  { value: "fill_blank", label: "Fill in the Blank" },
  { value: "ordering", label: "Ordering" },
  { value: "short_answer", label: "Short Answer" },
  { value: "listening", label: "Listening" }
];
const QuestionDialog = ({ exam, question, handler }) => {
  const [open, setOpen] = useState(false);
  const [isSubmit, setIsSubmit] = useState(false);
  const [isFileSelected, setIsFileSelected] = useState(false);
  const [isFileUploaded, setIsFileUploaded] = useState(false);
  const initialFormData = {
    exam_id: exam.id,
    title: (question == null ? void 0 : question.title) || "",
    description: (question == null ? void 0 : question.description) || "",
    marks: (question == null ? void 0 : question.marks) || 1,
    options: (question == null ? void 0 : question.options) || {},
    question_options: ((question == null ? void 0 : question.question_options) || []).map((opt) => ({
      id: opt.id ? Number(opt.id) : void 0,
      option_text: opt.option_text,
      is_correct: opt.is_correct,
      sort: opt.sort
    })),
    question_type: (question == null ? void 0 : question.question_type) || "multiple_choice",
    exam_question_id: (question == null ? void 0 : question.id) ? Number(question.id) : null
  };
  const { data, setData, post, put, errors, processing, reset, clearErrors } = useForm(initialFormData);
  const handleSubmit = (e) => {
    var _a;
    e.preventDefault();
    if (data.question_type === "listening" && ((_a = data.options) == null ? void 0 : _a.audio_source) === "upload") {
      if (!question || isFileSelected) {
        if (!isFileUploaded) {
          setIsSubmit(true);
          return;
        }
      }
    }
    submitForm();
  };
  const submitForm = () => {
    clearErrors();
    if (question) {
      put(route("exam-questions.update", question.id), {
        preserveScroll: true,
        onSuccess: () => {
          setOpen(false);
          reset();
          setIsSubmit(false);
          setIsFileUploaded(false);
        }
      });
    } else {
      post(route("exam-questions.store"), {
        preserveScroll: true,
        onSuccess: () => {
          setOpen(false);
          reset();
          setIsSubmit(false);
          setIsFileUploaded(false);
        }
      });
    }
  };
  useEffect(() => {
    if (isFileUploaded && isSubmit) {
      submitForm();
    }
  }, [isFileUploaded, isSubmit]);
  useEffect(() => {
    if (!open) {
      setIsSubmit(false);
      setIsFileSelected(false);
      setIsFileUploaded(false);
    }
  }, [open]);
  const renderQuestionTypeForm = () => {
    const props = {
      data,
      setData,
      errors
    };
    switch (data.question_type) {
      case "multiple_choice":
      case "multiple_select":
        return /* @__PURE__ */ jsx(MultipleChoiceForm, { ...props, isMultipleSelect: data.question_type === "multiple_select" });
      case "matching":
        return /* @__PURE__ */ jsx(MatchingForm, { ...props });
      case "fill_blank":
        return /* @__PURE__ */ jsx(FillBlankForm, { ...props });
      case "ordering":
        return /* @__PURE__ */ jsx(OrderingForm, { ...props });
      case "short_answer":
        return /* @__PURE__ */ jsx(ShortAnswerForm, { ...props });
      case "listening":
        return /* @__PURE__ */ jsx(
          ListeningForm,
          {
            ...props,
            isSubmit,
            setIsSubmit,
            setIsFileSelected,
            setIsFileUploaded
          }
        );
      default:
        return null;
    }
  };
  return /* @__PURE__ */ jsxs(Dialog, { open, onOpenChange: setOpen, children: [
    /* @__PURE__ */ jsx(DialogTrigger, { children: handler }),
    /* @__PURE__ */ jsxs(DialogContent, { className: "max-h-[90vh] max-w-4xl overflow-y-auto", children: [
      /* @__PURE__ */ jsx(DialogHeader, { children: /* @__PURE__ */ jsx(DialogTitle, { children: question ? "Edit Question" : "Create Question" }) }),
      /* @__PURE__ */ jsxs("form", { onSubmit: handleSubmit, className: "space-y-6", children: [
        /* @__PURE__ */ jsxs("div", { className: "grid gap-6 md:grid-cols-2", children: [
          /* @__PURE__ */ jsxs("div", { children: [
            /* @__PURE__ */ jsx(Label, { children: "Question Type *" }),
            /* @__PURE__ */ jsxs(
              Select,
              {
                value: data.question_type,
                onValueChange: (value) => setData("question_type", value),
                disabled: question ? true : false,
                children: [
                  /* @__PURE__ */ jsx(SelectTrigger, { children: /* @__PURE__ */ jsx(SelectValue, { placeholder: "Select question type" }) }),
                  /* @__PURE__ */ jsx(SelectContent, { children: questionTypes.map((type) => /* @__PURE__ */ jsx(SelectItem, { value: type.value, children: type.label }, type.value)) })
                ]
              }
            ),
            /* @__PURE__ */ jsx(InputError, { message: errors.question_type })
          ] }),
          /* @__PURE__ */ jsxs("div", { children: [
            /* @__PURE__ */ jsx(Label, { children: "Marks *" }),
            /* @__PURE__ */ jsx(
              Input,
              {
                type: "number",
                step: "0.5",
                min: "0.5",
                name: "marks",
                value: data.marks.toString(),
                onChange: (e) => setData("marks", parseFloat(e.target.value) || 0),
                placeholder: "Enter marks"
              }
            ),
            /* @__PURE__ */ jsx(InputError, { message: errors.marks })
          ] })
        ] }),
        /* @__PURE__ */ jsxs("div", { children: [
          /* @__PURE__ */ jsx(Label, { children: "Question Title *" }),
          /* @__PURE__ */ jsx(Input, { name: "title", value: data.title, onChange: (e) => onHandleChange(e, setData), placeholder: "Enter question title" }),
          /* @__PURE__ */ jsx(InputError, { message: errors.title })
        ] }),
        /* @__PURE__ */ jsxs("div", { children: [
          /* @__PURE__ */ jsx(Label, { children: "Description (Optional)" }),
          /* @__PURE__ */ jsx(
            Editor,
            {
              ssr: true,
              output: "html",
              placeholder: {
                paragraph: "Add additional context or instructions...",
                imageCaption: "Add additional context or instructions..."
              },
              contentMinHeight: 150,
              contentMaxHeight: 300,
              initialContent: data.description,
              onContentChange: (value) => setData((prev) => ({
                ...prev,
                description: value
              }))
            }
          ),
          /* @__PURE__ */ jsx(InputError, { message: errors.description })
        ] }),
        renderQuestionTypeForm(),
        /* @__PURE__ */ jsxs("div", { className: "flex justify-end gap-3 border-t pt-4", children: [
          /* @__PURE__ */ jsx(Button, { type: "button", variant: "outline", onClick: () => setOpen(false), disabled: processing || isSubmit, children: "Cancel" }),
          /* @__PURE__ */ jsx(LoadingButton, { loading: processing || isSubmit, disabled: processing || isSubmit, children: question ? "Update Question" : "Create Question" })
        ] })
      ] })
    ] })
  ] });
};
export {
  QuestionDialog as default
};
