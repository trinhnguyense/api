"""Command-line demo for running DeepSeek OCR via Hugging Face Inference API."""
from __future__ import annotations

import argparse
import os
from pathlib import Path
from typing import Optional

from huggingface_hub import InferenceClient


MODEL_ID = "deepseek-ai/DeepSeek-OCR"
DEFAULT_ENV_VAR = "HF_API_TOKEN"


def run_ocr(image_path: Path, token: Optional[str], model_id: str = MODEL_ID) -> str:
    """Run OCR on the given image and return extracted text."""
    if not image_path.is_file():
        raise FileNotFoundError(f"Image not found: {image_path}")

    if token is None:
        token = os.environ.get(DEFAULT_ENV_VAR)
    if not token:
        raise RuntimeError(
            "A Hugging Face access token is required. Provide it with --token "
            f"or set the {DEFAULT_ENV_VAR} environment variable."
        )

    client = InferenceClient(model=model_id, token=token)

    with image_path.open("rb") as handle:
        image_bytes = handle.read()

    # The DeepSeek OCR model is served as an image-to-text endpoint.
    result = client.image_to_text(image=image_bytes)
    if isinstance(result, dict):
        # huggingface_hub<0.21 returns a dict with the generated text inside
        return result.get("generated_text") or ""
    return str(result)


def build_parser() -> argparse.ArgumentParser:
    parser = argparse.ArgumentParser(description="Run DeepSeek OCR demo via Hugging Face API")
    parser.add_argument("image", type=Path, help="Path to the input image file")
    parser.add_argument(
        "--token",
        type=str,
        help=(
            "Hugging Face access token. If omitted, the value from the"
            f" {DEFAULT_ENV_VAR} environment variable is used."
        ),
    )
    parser.add_argument(
        "--model",
        default=MODEL_ID,
        help="Override the default model identifier (for advanced use)",
    )
    return parser


def main() -> None:
    parser = build_parser()
    args = parser.parse_args()

    text = run_ocr(args.image, args.token, model_id=args.model)
    print(text)


if __name__ == "__main__":
    main()
