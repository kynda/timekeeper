CREATE TABLE "time" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
  "users_id" INTEGER NOT NULL DEFAULT 4,
  "date" DATE NOT NULL,
  "start" TIME NOT NULL,
  "end" TIME NOT NULL,
  "hours" FLOAT NOT NULL,
  "account" VARCHAR(55) NOT NULL,
  "task" VARCHAR(55) NOT NULL,
  "notes" TEXT NOT NULL,
  "billable" BOOL NOT NULL
);
