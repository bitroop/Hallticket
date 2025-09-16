import pandas as pd
import json

# Load Excel
students = pd.read_excel("students.xlsx", sheet_name="Students")
courses = pd.read_excel("students.xlsx", sheet_name="Courses")

# Convert to JSON
students_json = students.to_dict(orient="records")

# Group courses by branch+semester
courses_grouped = {}
for _, row in courses.iterrows():
    key = f"{row['branch']}_{row['semester']}"
    if key not in courses_grouped:
        courses_grouped[key] = []
    courses_grouped[key].append({
        "code": row["code"],
        "desc": row["desc"],
        "ra": row["ra"],
        "date": row["date"],
        "session": row["session"]
    })

# Save JSON
with open("students.json", "w", encoding="utf-8") as f:
    json.dump(students_json, f, indent=4)

with open("courses.json", "w", encoding="utf-8") as f:
    json.dump(courses_grouped, f, indent=4)

print("✅ JSON files generated: students.json, courses.json")
