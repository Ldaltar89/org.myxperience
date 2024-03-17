```SQL
// ---- Ya existen ---- //
/* No crear solo use como referencia
 * para hacer las relaciones
 */
Table seasons {
  id Uuid [primary key]
  name varachar(100)
}

Table user {
  id Uuid [primary key]
  name varachar(100)
}
// --------------------- //

// --------------- Crear ---------------- //
/* Prestar atencion a los comentarios
 * de la derecha, son los que definen si
 * son nullable o no los campos
 * Prestar atención a los tipos de datos
 */

// Name: ExamnsType
Table examns_type {
  id Uuid [primary key]
  name varachar(100) // [no] nullable
  description varchar(255) // [yes] nullable
  isActive bool // [no] nullable
  createdAt datetime // [no] nullable
  createdBy varchar(100) // [no] nullable
  updatedAt datetime // [yes] nullable
  updatedBy varchar(100) // [yes] nullable
}

// Name: Examns
Table examns {
  id Uuid [primary key]
  name varachar(100) // [no] nullable
  description varchar(255) // [yes] nullable
  score decimal // [yes] nullable 5 number, 2 decimal
  score_pass decimal // [yes] nullable 5 number, 2 decimal
  season_id Uuid
  examn_type_id Uuid
  isActive bool // [no] nullable
  createdAt datetime // [no] nullable
  createdBy varchar(100) // [no] nullable
  updatedAt datetime // [yes] nullable
  updatedBy varchar(100) // [yes] nullable
}

Ref: examns.season_id  > seasons.id
Ref: examns.examn_type_id > examns_type.id

// Name: Questions
Table questions {
  id Uuid [primary key]
  question varachar(255) // [no] nullable
  descrption varchar(255) // [yes] nullable
  /* question_type: define si la respuesta
     es input(text) o choices (radiobutton)
     INPUT | CHOICES
   */
  question_type varchar(10) // [no] nullable
  question_image varchar(255) // [yes] nullable
  question_audio varchar(255) // [yes] nullable
  points decimal // [yes] nullable
  examn_id Uuid
  isActive bool // [no] nullable
  createdAt datetime // [no] nullable
  createdBy varchar(100) // [no] nullable
  updatedAt datetime // [yes] nullable
  updatedBy varchar(100) // [yes] nullable
}

Ref: questions.examn_id  > examns.id

// Name: Answers
Table answers {
  id Uuid [primary key]
  answer varachar(255) // [no] nullable
  question_image varchar(255) // [yes] nullable
  question_audio varchar(255) // [yes] nullable
  correct bool // [no] nullable
  question_id Uuid
  isActive bool // [no] nullable
  createdAt datetime // [no] nullable
  createdBy varchar(100) // [no] nullable
  updatedAt datetime // [yes] nullable
  updatedBy varchar(100) // [yes] nullable
}

Ref: questions.id > answers.question_id

// Name: UserExamns
Table user_examns {
  id Uuid [primary key]
  isDone bool // [no] nullable
  isApproved bool // [no] nullable
  isCanceled bool // [no] nullable
  score decimal // [no] nullable 5 number, 2 decimal
  examn_id Uuid
  season_id Uuid
  user_id Uuid
  isActive bool // [no] nullable
  createdAt datetime // [no] nullable
  createdBy varchar(100) // [no] nullable
  updatedAt datetime // [yes] nullable
  updatedBy varchar(100) // [yes] nullable
}

Ref: user_examns.examn_id > examns.id
Ref: user_examns.user_id > user.id
Ref: user_examns.season_id > seasons.id

// Name: UserQuestions
Table user_questions {
  id Uuid [primary key]
  points decimal // [no] nullable
  /* correct bool: marcar is la respuesta del user
  fue correcta o no, es diferente de answer */
  correct bool  // [no] nullable
  user_examn_id Uuid
  question_id Uuid
  isActive bool // [no] nullable
  createdAt datetime // [no] nullable
  createdBy varchar(100) // [no] nullable
  updatedAt datetime // [yes] nullable
  updatedBy varchar(100) // [yes] nullable
}

Ref: user_questions.user_examn_id > user_examns.id
Ref: user_questions.question_id > questions.id

// Name: UserAnswers
Table user_answers {
  id Uuid [primary key]
  correct bool // [no] nullable
  user_question_id Uuid
  answer_id Uuid
  isActive bool // [no] nullable
  createdAt datetime // [no] nullable
  createdBy varchar(100) // [no] nullable
  updatedAt datetime // [yes] nullable
  updatedBy varchar(100) // [yes] nullable

}

Ref: user_answers.user_question_id > user_questions.id
Ref: user_answers.answer_id > answers.id

```
