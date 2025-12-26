import { jsx, jsxs } from "react/jsx-runtime";
import { I as InputError } from "./input-error-CEW4jhey.js";
import { L as LoadingButton } from "./loading-button-C4Hk_jCd.js";
import { C as Card } from "./card-D8SB2yrw.js";
import { I as Input } from "./input-C6-Ta46A.js";
import { L as Label } from "./label-Dd_w2I6M.js";
import { usePage, useForm } from "@inertiajs/react";
import { useState } from "react";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
import "lucide-react";
import "./button-jZyzwgdo.js";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "@radix-ui/react-label";
const Media = () => {
  const { props } = usePage();
  const { tab, exam } = props;
  const [previewThumbnail, setPreviewThumbnail] = useState(exam.thumbnail);
  const { data, setData, post, errors, reset, processing } = useForm({
    tab,
    thumbnail: null
  });
  const handleSubmit = (e) => {
    e.preventDefault();
    post(route("exams.update", { exam: exam.id }), {
      onSuccess() {
        reset();
      }
    });
  };
  return /* @__PURE__ */ jsx(Card, { className: "container p-4 sm:p-6", children: /* @__PURE__ */ jsxs("form", { onSubmit: handleSubmit, className: "space-y-4", children: [
    /* @__PURE__ */ jsxs("div", { children: [
      /* @__PURE__ */ jsx(Label, { children: "Thumbnail" }),
      /* @__PURE__ */ jsx(
        Input,
        {
          type: "file",
          name: "thumbnail",
          onChange: (e) => {
            var _a;
            const file = (_a = e.target.files) == null ? void 0 : _a[0];
            if (file) {
              setData("thumbnail", file);
              const reader = new FileReader();
              reader.onloadend = () => {
                setPreviewThumbnail(reader.result);
              };
              reader.readAsDataURL(file);
            }
          }
        }
      ),
      /* @__PURE__ */ jsx(InputError, { message: errors.thumbnail }),
      /* @__PURE__ */ jsx("p", { className: "mt-1 text-xs text-gray-500", children: "Recommended size: 400x300px. Max size: 2MB" }),
      previewThumbnail && /* @__PURE__ */ jsxs("div", { className: "mt-4", children: [
        /* @__PURE__ */ jsx(Label, { className: "mb-2 block", children: "Preview:" }),
        /* @__PURE__ */ jsx("img", { src: previewThumbnail || "/assets/images/blank-image.jpg", alt: "Thumbnail preview", className: "w-full max-w-sm rounded-md" })
      ] })
    ] }),
    /* @__PURE__ */ jsx("div", { className: "mt-8", children: /* @__PURE__ */ jsx(LoadingButton, { loading: processing, children: "Save Changes" }) })
  ] }) });
};
export {
  Media as default
};
