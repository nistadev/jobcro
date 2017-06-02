from django.http import HttpResponse, Http404
from django.shortcuts import render, get_object_or_404

from .models import Question

def index(request):
	ultimes_preguntes = Question.objects.order_by('-data_publicacio')[:5]
	plantilla = 'polls/index.html'
	context = {'ultimes_preguntes' : ultimes_preguntes}
	return render(request, plantilla, context)

def detalls(request, idPregunta):
	p = get_object_or_404(Question, pk=idPregunta)
	plantilla = 'polls/detalls.html'
	context = {'p': p}
	return render(request, plantilla, context)

def resultats(request, idPregunta):
	resposta = "Estas mirant els resultats de la pregunta {}."
	return HttpResponse(response.format(idPregunta))

def votar(request, idPregunta):
	return HttpResponse("Estas votant la pregunta {}.".format(idPregunta))